<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Models\TeacherResponsibility;
use App\Repositories\GroupRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $data['teachers'] = TeacherRepository::getAll();
        return view('backend.dashboard.teachers.index', $data);
    }

    public function create()
    {
        $data['groups'] = GroupRepository::query()->where('status', true)->get();
        return view('backend.dashboard.teachers.create', $data);
    }

    public function store(TeacherRequest $request)
    {
        TeacherRepository::storeByRequest($request);
        return back()->with('success', 'Teacher is created successfully!');
    }

    public function show($slug)
    {
        $data['teacher'] = TeacherRepository::query()->where('slug', $slug)->first();
        return view('backend.dashboard.teachers.show', $data);
    }

    public function edit($slug)
    {
        $data['groups'] = GroupRepository::query()->where('status', true)->get();
        $data['teacher'] = TeacherRepository::query()->where('slug', $slug)->first();
        return view('backend.dashboard.teachers.edit', $data);
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        TeacherRepository::updateByRequest($request, $teacher);
        return back()->with('success', 'Teacher is updated successfully!');
    }
    public function destroy(Teacher $teacher)
    {
        if ($teacher->image) {
            $imagePath = $teacher->image;
            unlink(public_path($imagePath));
        }
        $teacher->delete();
        return back()->with('success', 'Teacher is deleted successfully!');
    }

    public function status(Request $request, Teacher $teacher)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $teacher->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }

    //In this function for teacher responsiblity
    public function responsIndex()
    {
        $data['respons'] = TeacherResponsibility::all();
        return view('backend.dashboard.admin.teacher-respons.index', $data);
    }
    public function responsCreate()
    {
        $data['teachers'] = Teacher::where('status', 1)->get();
        return view('backend.dashboard.admin.teacher-respons.create', $data);
    }
    public function responsStore(Request $request)
    {
        $this->validate($request, [
            'teacher_id' => 'required',
            'respons_date' => 'required',
            'responsibility' => 'required',
        ]);
        $data = new TeacherResponsibility();
        $data->teacher_id = $request->teacher_id;
        $data->respons_date = $request->respons_date;
        $data->responsibility = $request->responsibility;
        $data->save();
        $notification = array(
            'message' => 'Responsibility has been inserted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function responsEdit($id)
    {
        $data['respons'] = TeacherResponsibility::find($id);
        $data['teachers'] = Teacher::where('status', 1)->get();
        return view('backend.dashboard.admin.teacher-respons.edit', $data);
    }
    public function responsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'teacher_id' => 'required',
            'respons_date' => 'required',
            'responsibility' => 'required',
        ]);
        $data = TeacherResponsibility::find($id);
        $data->teacher_id = $request->teacher_id;
        $data->respons_date = $request->respons_date;
        $data->responsibility = $request->responsibility;
        $data->save();
        $notification = array(
            'message' => 'Responsibility has been updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function responsDelete($id)
    {
        $data = TeacherResponsibility::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Responsibility has been deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
