<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\UpdateStudentRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

final class StudentController extends Controller
{
    public function index() {
        $students = Student::all();

        return StudentResource::collection($students);
    }

    public function show(int $id) {
        $student = Student::findOrFail($id);

        return new StudentResource($student);
    }

    public function create(CreateStudentRequest $request) {
        $body = $request->all();

        $student = Student::create([
            'name' => $body['name'],
            'course' => $body['name'] ?? 'unassigned',
        ]);

        return new StudentResource($student);
    }

    public function replace(UpdateStudentRequest $request, $id) {
        $oldStudent = Student::findOrFail($id);

        $body = $request->all();

        $student = Student::create([
            'name' => $body['name'],
            'course' => $body['course'] ?? 'unassigned',
        ]);

        $oldStudent->delete();

        return new StudentResource($student);
    }

    public function update(UpdateStudentRequest $request, $id) {
        $body = $request->all();

        $student = Student::updateOrCreate([
            'id' => $id,
            'name' => $body['name'],
            'course' => $body['course'] ?? 'unassigned',
        ]);

        return new StudentResource($student);
    }

    public function delete(int $id) {
        $student = Student::findOrFail($id);

        $student->delete();

        return new JsonResponse([
            'message' => 'Student has been deleted',
            'data' => $student
        ], JsonResponse::HTTP_NO_CONTENT);
    }
}
