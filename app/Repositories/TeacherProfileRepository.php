<?php

namespace App\Repositories;

use App\Http\Requests\TeacherProfileRequest;
use App\Models\Teacher;

class TeacherProfileRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Teacher::class;
    }

    public static function storeByRequest(TeacherProfileRequest $request, Teacher $teacher)
    {
        $file = $request->file('profile_image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'teacher' . '_' . uniqid(). '.' . $extension;
            if($teacher->image){
                unlink(public_path($teacher->image));
            }
            $file->move(public_path('uploaded/teacher'), $fileName);
            $imagePath = '/uploaded/teacher/' . $fileName;
        }
       $teacherProfile = self::update($teacher,[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'marital_status' => $request->marital_status,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'qualification' => $request->qualification,
            'designation' => $request->designation,
            'c_address' => $request->c_address,
            'data_of_joining' => $request->data_of_joining,
            'image' => $imagePath ?? $teacher->image,
       ]);
       return $teacherProfile;
    }
}
