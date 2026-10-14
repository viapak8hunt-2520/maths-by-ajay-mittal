<?php
    $statusValue = $status instanceof \App\Enums\PublicationStatus ? $status->value : (string) $status;
    $class = match ($statusValue) {
        'published' => 'admin-badge-success',
        'draft' => 'admin-badge-warning',
        default => 'admin-badge-neutral',
    };
    $label = $status instanceof \BackedEnum ? $status->label() : ucfirst($statusValue);
?>
<span class="<?php echo e($class); ?>"><?php echo e($label); ?></span>
<?php /**PATH /var/www/html/resources/views/admin/partials/status-badge.blade.php ENDPATH**/ ?>