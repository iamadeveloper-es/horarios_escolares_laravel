<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
          'username' => 'the student username',
          'password' => Hash::make('password'),
          'email' => 'iamastudent@gmail.com',
          'name' => 'the student name',
          'role' => 'admin',
        ]);
        DB::table('users')->insert([
          'username' => 'the student username',
          'password' => Hash::make('password'),
          'email' => 'iamastudent@gmail.com',
          'name' => 'the student name',
          'surname' => 'the student surname',
          'telephone' => '654758956',
          'nif' => '45845465R',
          'role' => 'student',
          
        ]);
      }
}
