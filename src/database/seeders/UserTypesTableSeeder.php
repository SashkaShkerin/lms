<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
//            ['title' => 'accountant', 'name' => 'Accountant', 'level' => 5],
            ['title' => 'student', 'name' => 'Ученик', 'level' => 4],
            ['title' => 'parent', 'name' => 'Родитель', 'level' => 4],
            ['title' => 'teacher', 'name' => 'Учитель', 'level' => 3],
            ['title' => 'admin', 'name' => 'Администратор', 'level' => 2],
            ['title' => 'super_admin', 'name' => 'Супер-админ', 'level' => 1],
           // ['title' => 'librarian', 'name' => 'librarian', 'level' => 6],
        ];
        DB::table('user_types')->insert($data);
    }
}
