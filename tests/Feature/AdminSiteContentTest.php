<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSiteContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_content_manager_can_view_site_content_form(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.site-content.edit'))
            ->assertOk()
            ->assertSee('Website content')
            ->assertSee('Hero banner')
            ->assertSee('Save website content');
    }
}
