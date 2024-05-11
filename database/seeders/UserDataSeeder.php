<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Teacher;
use App\Repositories\GroupRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin123'),
            'remember_token'    => Str::random(10),

        ]);
        DB::table('accountants')->insert([
            'name'              => 'accountant',
            'email'             => 'accountant@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123123123'),
            'remember_token'    => Str::random(10),

        ]);
        DB::table('principles')->insert([
            'name'              => 'principle',
            'email'             => 'principle@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123123123'),
            'remember_token'    => Str::random(10),

        ]);
        DB::table('teachers')->insert([
            'name'              => 'Teacher',
            'slug'              => 'teacher',
            'email'             => 'teacher@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('teacher123'),
            'remember_token'    => Str::random(10),

        ]);
        DB::table('students')->insert([
            'name'              => 'Student',
            'slug'              => 'student',
            'email'             => 'student@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('student123'),
            'remember_token'    => Str::random(10),

        ]);
        DB::table('hrs')->insert([
            'name'              => 'hr',
            'email'             => 'hr@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123123123'),
            'remember_token'    => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name'              => 'user',
            'email'             => 'user@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('user1234'),
            'remember_token'    => Str::random(10),

        ]);
    }

}
