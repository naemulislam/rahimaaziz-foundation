<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Http\Request;

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

    public static function storeByRequest(Request $request): Student
    {
        return self::create([
            //
        ]);
    }

    public static function updateByRequest(Request $request, Student $student): Student
    {
        $student->update([
            //
        ]);
        return $student;
    }
}
