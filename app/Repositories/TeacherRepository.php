<?php

namespace App\Repositories;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherRepository extends Repository
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

    public static function storeByRequest(TeacherRequest $request)
    {
        $slug = Str::slug($request->name);
        $generate_id  = random_int(10000000, 99999999);
        $image = null;
        $file = $request->file('teacher_image');
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = $slug .'_'. uniqid() .'.'. $extension;
            $file->move(public_path('uploaded/teacher'), $fileName);
            $image = '/uploaded/teacher/'. $fileName;
        }
       $teacherCreate = self::create([
            'id_number' => $generate_id,
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'email_verified_at' => now(),
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'marital_status' => $request->marital_status,
            'qualification' => $request->qualification,
            'designation' => $request->designation,
            'data_of_joining' => $request->data_of_joining,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'c_address' => $request->c_address,
            'password' => Hash::make($request->password),
            'image' => $image,
       ]);
       return $teacherCreate;
    }
    public static function updateByRequest(TeacherRequest $request, Teacher $teacher)
    {
        $password = $teacher->password;
        if($request->password){
            $password = Hash::make($request->password);
        }

        $slug = Str::slug($request->name);
        // $generate_id  = random_int(10000000, 99999999);
        $image = null;
        $file = $request->file('teacher_image');
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = $slug .'_'. uniqid() .'.'. $extension;
            @unlink(public_path($teacher->image));
            $file->move(public_path('uploaded/teacher'), $fileName);
            $image = '/uploaded/teacher/'. $fileName;
        }
       $teacherUpdate = self::update($teacher,[
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'marital_status' => $request->marital_status,
            'qualification' => $request->qualification,
            'designation' => $request->designation,
            'data_of_joining' => $request->data_of_joining,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'c_address' => $request->c_address,
            'password' => $password,
            'image' => $image ?? $teacher->image,
       ]);
       return $teacherUpdate;
    }
}
