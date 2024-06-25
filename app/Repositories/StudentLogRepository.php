<?php

namespace App\Repositories;

use App\Models\StudentLogs;
use Illuminate\Http\Request;

class StudentLogRepository extends Repository
{
    public static function model()
    {
        return StudentLogs::class;
    }

    public static function storeByRequest($student, $admissionTable)
    {
        $create = self::create([
            'student_id' => $student->id,
            'group_id' => $admissionTable->group_id,
            'roll' => $admissionTable->roll,
            'total_marks' => null,
            'gpa' => null
        ]);
        return $create;
    }
}
