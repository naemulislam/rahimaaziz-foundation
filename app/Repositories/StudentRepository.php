<?php

namespace App\Repositories;

use App\Http\Requests\AdmissionRequest;
use App\Http\Requests\OnlineAdmissionRequest;
use App\Http\Requests\StudentProfileRequest;
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

    public static function storeByRequest(AdmissionRequest $request)
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
            'admission_status' => true,
            'status_type' => 1
        ]);
        return $studentCreate;
    }

    public static function updateByRequest(AdmissionRequest $request, Student $student)
    {
        $slug = Str::Slug($request->applicant_name);
        $file = $request->file('student_image');
        $image = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = $slug . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $student->image;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/image'), $fileName);
            $image = '/uploaded/student/image/' . $fileName;
        }
        $studentUpdate = self::update($student, [
            'name' => $request->applicant_name,
            'slug' => $slug,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'image' => $image ?? $student->image,
        ]);
        return $studentUpdate;
    }
    public static function registrationAdmissionUpdate(AdmissionRequest $request)
    {
        $student = self::query()->where('id', $request->student_id)->first();

        $slug = $student->slug;
        $file = $request->file('student_image');
        $image = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = $slug . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $student->image;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/image'), $fileName);
            $image = '/uploaded/student/image/' . $fileName;
        }
        $studentUpdate = self::update($student, [
            'image' => $image ?? $student->image,
            'admission_status' => true,
            'status_type' => 1
        ]);
        return $studentUpdate;
    }
    public static function onlineAdmissionCreate(OnlineAdmissionRequest $request)
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
            'admission_status' => false,
            'status_type' => 0
        ]);
        return $studentCreate;
    }
    //Student portal Profile update method
    public static function studentPortalProfileUpdate(StudentProfileRequest $request, Student $student)
    {
        $slug = Str::Slug($request->name);
        $file = $request->file('image');
        $image = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = $slug . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $student->image;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/image'), $fileName);
            $image = '/uploaded/student/image/' . $fileName;
        }
        $studentUpdate = self::update($student, [
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image ?? $student->image,
        ]);
        return $studentUpdate;
    }
}
