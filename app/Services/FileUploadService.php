<?php

namespace App\Services;

use App\Models\MediaFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class FileUploadService
{
    public function storeDocument(UploadedFile $file, string $directory = 'documents'): string
    {
        $this->assertAllowed($file, ['application/pdf']);

        $path = $file->store($directory, 'local');

        $this->recordMedia($path, $file, 'documents');

        return $path;
    }

    public function storeImage(UploadedFile $file, string $directory = 'images'): string
    {
        $this->assertAllowed($file, ['image/jpeg', 'image/png', 'image/webp', 'image/gif']);

        $path = $file->store($directory, 'local');

        $this->recordMedia($path, $file, 'images');

        return $path;
    }

    public function deleteIfUnused(?string $path): void
    {
        if (! $path) {
            return;
        }

        \Storage::disk('local')->delete($path);
    }

    protected function assertAllowed(UploadedFile $file, array $mimes): void
    {
        if (! in_array($file->getMimeType(), $mimes, true)) {
            throw new \InvalidArgumentException('Unsupported file type.');
        }

        if ($file->getSize() > 15 * 1024 * 1024) {
            throw new \InvalidArgumentException('File exceeds maximum upload size.');
        }
    }

    protected function recordMedia(string $path, UploadedFile $file, string $collection): void
    {
        if (! class_exists(MediaFile::class) || ! Schema::hasTable('media_files')) {
            return;
        }

        MediaFile::query()->create([
            'disk' => 'local',
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size_bytes' => $file->getSize(),
            'collection' => $collection,
            'uploaded_by' => Auth::id(),
        ]);
    }
}
