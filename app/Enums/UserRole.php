<?php

namespace App\Enums;

enum UserRole: string
{
    case SuperAdmin = 'super_admin';
    case ContentManager = 'content_manager';
    case Staff = 'staff';

    public function label(): string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::ContentManager => 'Content Manager',
            self::Staff => 'Staff',
        };
    }

    public function canManageContent(): bool
    {
        return in_array($this, [self::SuperAdmin, self::ContentManager], true);
    }

    public function canManageEnquiries(): bool
    {
        return true;
    }

    public function canManageUsers(): bool
    {
        return $this === self::SuperAdmin;
    }
}
