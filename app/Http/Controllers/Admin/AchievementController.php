<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AchievementController extends Controller
{
    public function index(): View
    {
        return view('admin.achievements.index', ['achievements' => Achievement::query()->orderBy('display_order')->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.achievements.form', ['achievement' => new Achievement(['status' => PublicationStatus::Draft])]);
    }

    public function store(Request $request): RedirectResponse
    {
        Achievement::query()->create($this->validated($request));

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created.');
    }

    public function edit(Achievement $achievement): View
    {
        return view('admin.achievements.form', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement): RedirectResponse
    {
        $achievement->update($this->validated($request));

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated.');
    }

    public function destroy(Achievement $achievement): RedirectResponse
    {
        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'student_name' => ['nullable', 'string', 'max:120'],
            'course_label' => ['nullable', 'string', 'max:120'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::enum(PublicationStatus::class)],
        ]);
    }
}
