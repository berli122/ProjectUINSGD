<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();

        try {

            $dosen = User::create(array_merge([
                'nip' => '1234567890',
                'name' => 'adminuin',
                'image' => 'nullable',
                'jabatan_id' => 1,
                'golongan_id' => 1,
                'email' => 'admin@uin.test',
                'password' => Hash::make('12345678')
            ], $default_user_value));

            $staff = User::create(array_merge([
                'nip' => '1234567890',
                'name' => 'staffuin',
                'image' => 'nullable',
                'jabatan_id' => 2,
                'golongan_id' => 2,
                'email' => 'staff@uin.test',
                'password' => Hash::make('12345678')
            ], $default_user_value));

            $role_dosen = Role::create(['name' => 'dosen']);
            $rol_staff = Role::create(['name' => 'staff']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $dosen->assignRole('admin');
            $staff->assignRole('staff');

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
        }




    }
}
