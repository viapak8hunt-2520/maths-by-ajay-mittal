<?php

namespace App\Console\Commands;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUserCommand extends Command
{
    protected $signature = 'maths:create-admin
                            {--name= : Administrator name}
                            {--email= : Administrator email}
                            {--password= : Password (min 12 characters)}
                            {--role=super_admin : super_admin, content_manager, or staff}';

    protected $description = 'Create an administrator account for the admin panel';

    public function handle(): int
    {
        $name = $this->option('name') ?: $this->ask('Name');
        $email = $this->option('email') ?: $this->ask('Email');
        $password = $this->option('password') ?: $this->secret('Password (min 12 characters)');
        $roleValue = $this->option('role') ?: UserRole::SuperAdmin->value;

        $validator = Validator::make(compact('name', 'email', 'password', 'roleValue'), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:12'],
            'roleValue' => ['required', 'in:super_admin,content_manager,staff'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => UserRole::from($roleValue),
            'is_active' => true,
        ]);

        $this->info('Administrator created successfully.');

        return self::SUCCESS;
    }
}
