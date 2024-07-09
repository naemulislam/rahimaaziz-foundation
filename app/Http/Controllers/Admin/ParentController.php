<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use App\Models\Children;
use App\Models\User;
use App\Repositories\ParentRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()
    {
        $data['parents'] = User::latest()->get();
        return view('backend.dashboard.parent.index', $data);
    }

    public function create()
    {
        $data['students'] = StudentRepository::query()->where('status', true)->where('admission_status', true)->where('status_type', true)->get();
        return view('backend.dashboard.parent.create', $data);
    }
    public function store(ParentRequest $request)
    {
       try{
        if (!empty($request->student_id)) {
            $parentId = ParentRepository::storeByRequest($request);
            foreach ($request->student_id as $student) {
                $child = new Children();
                $child->student_id = $student;
                $child->parent_id = $parentId->id;
                $child->save();
            }
        } else {
            return back()->with('error', 'Please select students!');
        }
        return back()->with('success', 'Parent has been created successfully!');
       }

        catch(\Exception $e){
            return redirect(route('admin.parent.index'))->with('error', 'Error Adding parent into system!'.$e->getMessage());
          }
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('backend.dashboard.admin.parent.show',compact('data'));
    }
    public function edit(User $user)
    {
        $data['user'] = $user;
        $data['childs'] = Children::select('student_id')->where('parent_id',$user->id)->get()->toArray();
        //return $data['childs']->parent_id;
        $data['students'] = StudentRepository::query()->where('status', true)->where('admission_status', true)->where('status_type', true)->get();
        return view('backend.dashboard.parent.edit', $data);
    }

    public function update(ParentRequest $request, User $user)
    {
        if(!empty($request->student_id)){
            $parentId = ParentRepository::updateByRequest($request, $user);
            $child_delete = Children::where('parent_id', $user->id)->get();
            // $child_delete->delete();
            $childrenData = [];
            foreach ($request->student_id as $student) {
                $childrenData[] = [
                    'student_id' => $student,
                    'parent_id' => $user->id
                ];
              $child_delete->children->sync($childrenData);
            }
        }
        return redirect()->route('admin.parent.index')->with('success', 'Parent has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function status(Request $request, $id)
    {
        $data = User::find($id);
        if ($request->status == 1) {
            $data->status = $request->status;
        } else {
            $data->status = 0;
        }

        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
