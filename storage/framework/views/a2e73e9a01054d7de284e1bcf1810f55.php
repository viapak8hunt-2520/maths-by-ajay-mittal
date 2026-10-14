<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Contact details</legend>
    <p class="admin-help mb-3">Shown in the footer, contact page and enquiry WhatsApp link.</p>
    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label class="admin-label">Phone (tel link)</label>
            <input class="admin-input" name="contact[phone]" value="<?php echo e($c('phone')); ?>" required>
        </div>
        <div>
            <label class="admin-label">Phone (display)</label>
            <input class="admin-input" name="contact[phone_display]" value="<?php echo e($c('phone_display')); ?>" required>
        </div>
        <div>
            <label class="admin-label">Email</label>
            <input class="admin-input" type="email" name="contact[email]" value="<?php echo e($c('email')); ?>" required>
        </div>
        <div>
            <label class="admin-label">WhatsApp number</label>
            <input class="admin-input" name="contact[whatsapp]" value="<?php echo e($c('whatsapp')); ?>" required>
            <p class="admin-help">Digits only with country code, e.g. 919876543210</p>
        </div>
    </div>
    <div>
        <label class="admin-label">Default WhatsApp message</label>
        <textarea class="admin-textarea" name="contact[whatsapp_message]" rows="2" required><?php echo e($c('whatsapp_message')); ?></textarea>
    </div>
    <div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2">
            <label class="admin-label">Address line</label>
            <input class="admin-input" name="contact[address][line1]" value="<?php echo e($c('address.line1')); ?>">
        </div>
        <div>
            <label class="admin-label">City</label>
            <input class="admin-input" name="contact[address][city]" value="<?php echo e($c('address.city')); ?>">
        </div>
        <div>
            <label class="admin-label">State</label>
            <input class="admin-input" name="contact[address][state]" value="<?php echo e($c('address.state')); ?>">
        </div>
        <div>
            <label class="admin-label">PIN code</label>
            <input class="admin-input" name="contact[address][pin]" value="<?php echo e($c('address.pin')); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">Social links</legend>
    <div class="space-y-4">
        <div>
            <label class="admin-label">Facebook URL</label>
            <input class="admin-input" type="url" name="social[facebook]" value="<?php echo e($s('facebook')); ?>" placeholder="https://facebook.com/...">
        </div>
        <div>
            <label class="admin-label">Instagram URL</label>
            <input class="admin-input" type="url" name="social[instagram]" value="<?php echo e($s('instagram')); ?>" placeholder="https://instagram.com/...">
        </div>
        <div>
            <label class="admin-label">YouTube URL</label>
            <input class="admin-input" type="url" name="social[youtube]" value="<?php echo e($s('youtube')); ?>" placeholder="https://youtube.com/...">
        </div>
    </div>
</fieldset>
<?php /**PATH /var/www/html/resources/views/admin/site-content/partials/tab-contact.blade.php ENDPATH**/ ?>