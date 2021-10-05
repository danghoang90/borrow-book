<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Student();
        $student->name = "Pham Van Teo";
        $student->student_code = "CG0001";
        $student->email = "teo@gmail.com";
        $student->phone = "098989892";
        $student->save();

        $student = new Student();
        $student->name = "Nguyen Van Nam";
        $student->student_code = "CG0002";

        $student->email = "nam@gmail.com";
        $student->phone = "088989892";
        $student->save();

        $student = new Student();
        $student->name = "Nguyen Minh Quan";
        $student->student_code = "CG0003";
        $student->email = "quan@gmail.com";
        $student->phone = "087989892";
        $student->save();
    }
}

