<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->json('subjects')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('published');
            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 500)->nullable();
            $table->longText('full_description')->nullable();
            $table->string('target_class', 50)->nullable();
            $table->string('audience')->nullable();
            $table->json('teaching_modes')->nullable();
            $table->json('tags')->nullable();
            $table->json('subjects')->nullable();
            $table->json('syllabus')->nullable();
            $table->json('chapters')->nullable();
            $table->json('benefits')->nullable();
            $table->json('outcomes')->nullable();
            $table->json('related_course_slugs')->nullable();
            $table->string('featured_image_path')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->timestamps();

            $table->index(['status', 'display_order']);
            $table->index('course_category_id');
        });

        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('published');
            $table->timestamps();

            $table->index(['course_id', 'display_order']);
        });

        Schema::create('study_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->foreignId('course_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('chapter_id')->nullable()->constrained()->nullOnDelete();
            $table->string('class_level', 50)->nullable();
            $table->string('subject')->nullable();
            $table->string('chapter_label')->nullable();
            $table->string('resource_type', 40);
            $table->string('file_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->unsignedInteger('pages')->nullable();
            $table->unsignedInteger('size_kb')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->foreignId('answer_key_resource_id')->nullable();
            $table->timestamps();

            $table->index(['status', 'resource_type']);
            $table->index('course_id');
        });

        Schema::create('test_papers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('instructions')->nullable();
            $table->foreignId('course_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('chapter_id')->nullable()->constrained()->nullOnDelete();
            $table->string('examination_type')->nullable();
            $table->string('paper_type', 40);
            $table->string('difficulty', 20)->nullable();
            $table->unsignedInteger('max_marks')->nullable();
            $table->unsignedInteger('duration_minutes')->nullable();
            $table->string('question_paper_path')->nullable();
            $table->string('answer_key_path')->nullable();
            $table->string('solution_path')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->timestamps();

            $table->index(['status', 'paper_type']);
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('published');
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('course_label')->nullable();
            $table->text('quote');
            $table->string('photo_path')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('draft');
            $table->timestamps();
        });

        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('student_name')->nullable();
            $table->string('course_label')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status', 20)->default('draft');
            $table->timestamps();
        });

        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('parent_name')->nullable();
            $table->string('phone', 30);
            $table->string('email')->nullable();
            $table->string('course_interest');
            $table->string('teaching_mode', 20);
            $table->text('message')->nullable();
            $table->string('status', 20)->default('new');
            $table->text('internal_notes')->nullable();
            $table->date('follow_up_date')->nullable();
            $table->string('outcome')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });

        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('group', 50)->index();
            $table->string('key')->unique();
            $table->json('value')->nullable();
            $table->timestamps();
        });

        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->string('disk', 20)->default('local');
            $table->string('path');
            $table->string('filename');
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('size_bytes')->default(0);
            $table->string('collection', 50)->nullable();
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index('collection');
        });

        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action');
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->json('properties')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('media_files');
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('enquiries');
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('test_papers');
        Schema::dropIfExists('study_resources');
        Schema::dropIfExists('chapters');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_categories');
    }
};
