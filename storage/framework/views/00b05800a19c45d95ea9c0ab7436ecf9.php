<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">SEO</legend>
    <div>
        <label class="admin-label">Page title (browser tab)</label>
        <input class="admin-input" name="about[seo][title]" value="<?php echo e($a('seo.title')); ?>" required>
    </div>
    <div>
        <label class="admin-label">Meta description</label>
        <textarea class="admin-textarea" name="about[seo][description]" rows="2" required><?php echo e($a('seo.description')); ?></textarea>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Page heading</legend>
    <div>
        <label class="admin-label">Title</label>
        <input class="admin-input" name="about[hero][title]" value="<?php echo e($a('hero.title')); ?>" required>
    </div>
    <div>
        <label class="admin-label">Subtitle</label>
        <textarea class="admin-textarea" name="about[hero][subtitle]" rows="2" required><?php echo e($a('hero.subtitle')); ?></textarea>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Content sections</legend>
    <?php $aboutSections = old('about.sections', $about['sections'] ?? []); ?>
    <div x-data="repeatableRows(<?php echo \Illuminate\Support\Js::from($aboutSections)->toHtml() ?>, { title: '', body: '' })">
        <div class="mb-2 flex items-center justify-between">
            <span class="admin-label mb-0">Sections (shown as cards on the about page)</span>
            <button type="button" class="admin-btn-ghost py-1.5 text-xs" @click="add()">+ Add section</button>
        </div>
        <div class="space-y-3">
            <template x-for="(row, index) in rows" :key="index">
                <div class="admin-repeater-row">
                    <div>
                        <label class="admin-label">Section title</label>
                        <input class="admin-input" x-model="row.title" :name="'about[sections]['+index+'][title]'">
                    </div>
                    <div>
                        <label class="admin-label">Body</label>
                        <textarea class="admin-textarea" rows="4" x-model="row.body" :name="'about[sections]['+index+'][body]'"></textarea>
                    </div>
                    <button type="button" class="admin-btn-ghost py-1 text-xs text-red-600" @click="remove(index)">Remove</button>
                </div>
            </template>
        </div>
    </div>
</fieldset>

<p class="text-sm text-slate-500">Individual FAQ questions are managed under <strong>FAQs</strong> in the sidebar. This page only controls the FAQ listing heading on the homepage preview block and the dedicated FAQ page title.</p>
<?php /**PATH /var/www/html/resources/views/admin/site-content/partials/tab-about.blade.php ENDPATH**/ ?>