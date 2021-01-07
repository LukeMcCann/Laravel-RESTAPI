<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    private int $numberOfStudents = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory($this->numberOfStudents)->create();
    }
}
