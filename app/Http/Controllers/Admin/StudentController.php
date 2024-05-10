<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityList;
use App\Models\Student;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function registerIndex()
    {
        $data['students'] = StudentRepository::query()->where('admission_status', false)->get();
        return view('backend.dashboard.student-register.register_index', $data);
    }
    public function registerDestroy(Student $student)
    {
        $student->delete();
        return back()->with('success', 'Student deleted successfully!');
    }

    ////////////////In this function for student daily activity list//////////////
    public function activityIndex()
    {
        $data = ActivityList::orderBy('order', 'asc')->get();
        return view('backend.dashboard.student-register.activity_index', compact('data'));
    }
    public function activityStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:activity_lists,name|string|max:40'
        ]);

        ActivityList::create([
            'name' => $request->name,
            'order' => $request->order,
            'status' => true,
            'author' => 'admin'
        ]);

        return back()->with('success', 'Activity is created successfully!');
    }
    public function activityUpdate(Request $request, ActivityList $activityList)
    {
        $this->validate($request, [
            'name' => 'required|unique:activity_lists,name|string|max:40'

        ]);
        $activityList->update([
            'name' => $request->name,
            'order' => $request->order,
        ]);

        return back()->with('success', 'Activity is updated successfully!');
    }
    public function activityDelete(Request $request, ActivityList $activityList)
    {
        $activityList->delete();
        return back()->with('success', 'Activity is deleted successfully!');
    }
    public function activityStatus(Request $request, ActivityList $activityList)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $activityList->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
