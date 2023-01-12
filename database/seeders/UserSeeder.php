<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nip' => '1234567890',
            'name' => 'adminuin',
            'image' => 'blank.jpg',
            'jabatan_id' => 1,
            'golongan_id' => 1,
            'role' => 'admin',
            'email' => 'admin@uin.test',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'nip' => '0987654321',
            'name' => 'user',
            'image' => 'blank.jpg',
            'jabatan_id' => 2,
            'golongan_id' => 2,
            'role' => 'user',
            'email' => 'user@role.test',
            'password' => Hash::make('12345678')
        ]);

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
