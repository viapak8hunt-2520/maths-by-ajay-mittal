<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        return view('admin.media.index', [
            'media' => MediaFile::query()->latest()->paginate(30),
        ]);
    }
}
