<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kiểm tra nếu admin đã tồn tại
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // Thay thế 'password' bằng mật khẩu bạn muốn
                'phone' => '12345678',
                'role_id' => 1, // Giả định role_id 1 là dành cho admin
            ]);

            $this->command->info('Admin user created successfully.');
        } else {
            $this->command->warn('Admin user already exists.');
        }
    }
}
