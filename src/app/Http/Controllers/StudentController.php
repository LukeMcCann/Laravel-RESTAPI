<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();

        return StudentResource::collection($students);
    }

    public function show() {

    }

    public function create() {

    }

    public function replace() {

    }

    public function delete() {

    }
}
