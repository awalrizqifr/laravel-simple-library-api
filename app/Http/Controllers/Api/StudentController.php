<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::get();
        return StudentResource::collection($students);
    }

    public function store(StudentRequest $request)
    {
        $student = Student::create($request->validated());
        return new StudentResource($student);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(Student $student, StudentRequest $request)
    {
        $student->update($request->validated());
        return new StudentResource($student);
    }

    public function destroy(Student $student) {
        $student->delete();
        return response()->noContent();
    }
}
