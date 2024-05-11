<?php

namespace App\Repositories;

use App\Http\Requests\AdmissionRequest;
use App\Models\StudentInfo;
use Illuminate\Http\Request;

class StudentInfoRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return StudentInfo::class;
    }

    public static function storeByRequest(AdmissionRequest $request, $studentId)
    {
       self::create([
        'student_id' => $studentId,
        'date_of_birth' => $request->date_of_birth,
        'place_of_birth' => $request->place_of_birth,
        'blood' => $request->blood,
        'student_type' => $request->student_type,
        'address' => $request->address,
        'city' => $request->city,
        'state' => $request->state,
        'zip_code' => $request->zip_code,
        //Guardian info
        'father_name' => $request->father_name,
        'father_call' => $request->father_call,
        'father_email' => $request->father_email,
        'mother_name' => $request->mother_name,
        'mother_call' => $request->mother_call,
        'e_name' => $request->e_name,
        'e_call' => $request->e_call,
       ]);
    }
}
