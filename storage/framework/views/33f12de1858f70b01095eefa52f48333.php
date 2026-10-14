<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">FAQ page header</legend>
    <p class="admin-help mb-3">Questions and answers are edited under <strong>FAQs</strong> in the sidebar. Set the page title and intro here.</p>
    <div>
        <label class="admin-label">Page title</label>
        <input class="admin-input" name="faqs[title]" value="<?php echo e($f('title')); ?>" required>
    </div>
    <div>
        <label class="admin-label">Intro paragraph</label>
        <textarea class="admin-textarea" name="faqs[intro]" rows="3" required><?php echo e($f('intro')); ?></textarea>
    </div>
</fieldset>
<?php /**PATH /var/www/html/resources/views/admin/site-content/partials/tab-faqs.blade.php ENDPATH**/ ?>