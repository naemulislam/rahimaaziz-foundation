<?php

namespace App\Repositories;

use App\Http\Requests\AdmissionRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Student::class;
    }

    public static function storeByRequest(AdmissionRequest $request): Student
    {
        $slug = Str::Slug($request->applicant_name);
        $file = $request->file('student_image');
        $image = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = $slug . '_' . uniqid() . '.' . $extenstion;
            $file->move(public_path('uploaded/student/image'), $fileName);
            $image = '/uploaded/student/image/' . $fileName;
        }
        $studentCreate = self::create([
            'name' => $request->applicant_name,
            'slug' => $slug,
            'email' => $request->email,
            'password' => Hash::make('student123'),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'image' => $image,
            'status' => true,
            'admission_status' => true
        ]);
        return $studentCreate;
    }

    public static function updateByRequest(Request $request, Student $student): Student
    {
        $student->update([
            //
        ]);
        return $student;
    }
}
