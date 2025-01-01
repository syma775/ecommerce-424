<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\AdminLogin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $admin = new AdminLogin();
        $admin->name = 'admin';
        $admin->email='admin@admin.com';
        $admin->password=bcrypt(123456789);
        $admin->save();
    }
}
