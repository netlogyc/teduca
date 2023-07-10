<?php

namespace Database\Seeders;

use DB;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = User::create([

        	'staff_id'=>'1001',
            'first_name'=>'Super',
            'last_name'=>'Admin',
            'email'=>'admin@mail.com',
            'phone'=>'0123456789',
            'dob'=>'2000-01-01',
            'password'=> Hash::make('admin1234'), //admin1234
            'password_text'=> Crypt::encryptString('admin1234'),
            'remember_token'=>'NlPo4Mr4KXcEw2Ltc2ujMwNh15VO405hLCeplSO1kDh7Gzr8r1J7ZnS3jixL',
            'is_admin'=>'1'

        ]);

        // Delete Old Roles
        DB::table('roles')->delete();

        $role = Role::create(['name' => 'Super Admin', 'slug' => 'super-admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        // Create Roles
        $data = [
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Accountant', 'slug' => 'accountant'],
            ['name' => 'Librarian', 'slug' => 'librarian'],
            ['name' => 'Receptionist', 'slug' => 'receptionist'],
            ['name' => 'Teacher', 'slug' => 'teacher'],
            ['name' => 'Office Assistant', 'slug' => 'office-assistant'],
        ];

        $roles = Role::insert($data);
    }
}
