<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Hero banner</legend>
    <div>
        <label class="admin-label">Headline</label>
        <input class="admin-input" name="homepage[hero][headline]" value="<?php echo e($h('hero.headline')); ?>" required>
    </div>
    <div>
        <label class="admin-label">Subheadline</label>
        <textarea class="admin-textarea" name="homepage[hero][subheadline]" rows="3" required><?php echo e($h('hero.subheadline')); ?></textarea>
    </div>
    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label class="admin-label">Primary button label</label>
            <input class="admin-input" name="homepage[hero][primary_cta][label]" value="<?php echo e($h('hero.primary_cta.label')); ?>" required>
            <p class="admin-help">Links to the courses page (route fixed in theme).</p>
        </div>
        <div>
            <label class="admin-label">Secondary button label</label>
            <input class="admin-input" name="homepage[hero][secondary_cta][label]" value="<?php echo e($h('hero.secondary_cta.label')); ?>" required>
            <p class="admin-help">Links to the contact page.</p>
        </div>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Introduction</legend>
    <div>
        <label class="admin-label">Section title</label>
        <input class="admin-input" name="homepage[intro][title]" value="<?php echo e($h('intro.title')); ?>" required>
    </div>
    <div>
        <label class="admin-label">Lead paragraph</label>
        <textarea class="admin-textarea" name="homepage[intro][lead]" rows="2" required><?php echo e($h('intro.lead')); ?></textarea>
    </div>
    <div>
        <label class="admin-label">Body text</label>
        <textarea class="admin-textarea" name="homepage[intro][body]" rows="4"><?php echo e($h('intro.body')); ?></textarea>
    </div>

    <?php $introHighlights = old('homepage.intro.highlights', $homepage['intro']['highlights'] ?? []); ?>
    <div x-data="repeatableRows(<?php echo \Illuminate\Support\Js::from($introHighlights)->toHtml() ?>, { label: '', value: '' })">
        <div class="mb-2 flex items-center justify-between">
            <span class="admin-label mb-0">Highlight cards</span>
            <button type="button" class="admin-btn-ghost py-1.5 text-xs" @click="add()">+ Add row</button>
        </div>
        <div class="space-y-3">
            <template x-for="(row, index) in rows" :key="index">
                <div class="admin-repeater-row">
                    <div class="grid gap-3 sm:grid-cols-2">
                        <div>
                            <label class="admin-label">Label</label>
                            <input class="admin-input" x-model="row.label" :name="'homepage[intro][highlights]['+index+'][label]'">
                        </div>
                        <div>
                            <label class="admin-label">Value</label>
                            <input class="admin-input" x-model="row.value" :name="'homepage[intro][highlights]['+index+'][value]'">
                        </div>
                    </div>
                    <button type="button" class="admin-btn-ghost py-1 text-xs text-red-600" @click="remove(index)">Remove</button>
                </div>
            </template>
        </div>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Why choose us</legend>
    <div>
        <label class="admin-label">Section title</label>
        <input class="admin-input" name="homepage[why_choose][title]" value="<?php echo e($h('why_choose.title')); ?>" required>
    </div>
    <?php $whyItems = old('homepage.why_choose.items', $homepage['why_choose']['items'] ?? []); ?>
    <div x-data="repeatableRows(<?php echo \Illuminate\Support\Js::from($whyItems)->toHtml() ?>, { title: '', description: '' })">
        <div class="mb-2 flex items-center justify-between">
            <span class="admin-label mb-0">Reason cards</span>
            <button type="button" class="admin-btn-ghost py-1.5 text-xs" @click="add()">+ Add reason</button>
        </div>
        <div class="space-y-3">
            <template x-for="(row, index) in rows" :key="index">
                <div class="admin-repeater-row">
                    <div>
                        <label class="admin-label">Title</label>
                        <input class="admin-input" x-model="row.title" :name="'homepage[why_choose][items]['+index+'][title]'">
                    </div>
                    <div>
                        <label class="admin-label">Description</label>
                        <textarea class="admin-textarea" rows="2" x-model="row.description" :name="'homepage[why_choose][items]['+index+'][description]'"></textarea>
                    </div>
                    <button type="button" class="admin-btn-ghost py-1 text-xs text-red-600" @click="remove(index)">Remove</button>
                </div>
            </template>
        </div>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Methodology</legend>
    <div>
        <label class="admin-label">Section title</label>
        <input class="admin-input" name="homepage[methodology][title]" value="<?php echo e($h('methodology.title')); ?>" required>
    </div>
    <?php $steps = old('homepage.methodology.steps', $homepage['methodology']['steps'] ?? []); ?>
    <div x-data="repeatableRows(<?php echo \Illuminate\Support\Js::from($steps)->toHtml() ?>, { title: '', description: '' })">
        <div class="mb-2 flex items-center justify-between">
            <span class="admin-label mb-0">Steps</span>
            <button type="button" class="admin-btn-ghost py-1.5 text-xs" @click="add()">+ Add step</button>
        </div>
        <div class="space-y-3">
            <template x-for="(row, index) in rows" :key="index">
                <div class="admin-repeater-row">
                    <div>
                        <label class="admin-label">Step title</label>
                        <input class="admin-input" x-model="row.title" :name="'homepage[methodology][steps]['+index+'][title]'">
                    </div>
                    <div>
                        <label class="admin-label">Description</label>
                        <textarea class="admin-textarea" rows="2" x-model="row.description" :name="'homepage[methodology][steps]['+index+'][description]'"></textarea>
                    </div>
                    <button type="button" class="admin-btn-ghost py-1 text-xs text-red-600" @click="remove(index)">Remove</button>
                </div>
            </template>
        </div>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Coaching modes</legend>
    <div>
        <label class="admin-label">Section title</label>
        <input class="admin-input" name="homepage[coaching_modes][title]" value="<?php echo e($h('coaching_modes.title')); ?>" required>
    </div>
    <?php
        $modes = old('homepage.coaching_modes.modes', $homepage['coaching_modes']['modes'] ?? []);
        $modesForJs = collect($modes)->map(fn ($m) => [
            'title' => $m['title'] ?? '',
            'description' => $m['description'] ?? '',
            'cta_label' => $m['cta']['label'] ?? ($m['cta_label'] ?? ''),
        ])->values()->all();
    ?>
    <div x-data="repeatableRows(<?php echo \Illuminate\Support\Js::from($modesForJs)->toHtml() ?>, { title: '', description: '', cta_label: '' })">
        <div class="mb-2 flex items-center justify-between">
            <span class="admin-label mb-0">Mode cards</span>
            <button type="button" class="admin-btn-ghost py-1.5 text-xs" @click="add()">+ Add mode</button>
        </div>
        <div class="space-y-3">
            <template x-for="(row, index) in rows" :key="index">
                <div class="admin-repeater-row">
                    <div>
                        <label class="admin-label">Title</label>
                        <input class="admin-input" x-model="row.title" :name="'homepage[coaching_modes][modes]['+index+'][title]'">
                    </div>
                    <div>
                        <label class="admin-label">Description</label>
                        <textarea class="admin-textarea" rows="2" x-model="row.description" :name="'homepage[coaching_modes][modes]['+index+'][description]'"></textarea>
                    </div>
                    <div>
                        <label class="admin-label">Button label</label>
                        <input class="admin-input" x-model="row.cta_label" :name="'homepage[coaching_modes][modes]['+index+'][cta_label]'">
                    </div>
                    <button type="button" class="admin-btn-ghost py-1 text-xs text-red-600" @click="remove(index)">Remove</button>
                </div>
            </template>
        </div>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Admission call-to-action</legend>
    <div>
        <label class="admin-label">Title</label>
        <input class="admin-input" name="homepage[admission_cta][title]" value="<?php echo e($h('admission_cta.title')); ?>" required>
    </div>
    <div>
        <label class="admin-label">Description</label>
        <textarea class="admin-textarea" name="homepage[admission_cta][description]" rows="3" required><?php echo e($h('admission_cta.description')); ?></textarea>
    </div>
</fieldset>
<?php /**PATH /var/www/html/resources/views/admin/site-content/partials/tab-homepage.blade.php ENDPATH**/ ?>