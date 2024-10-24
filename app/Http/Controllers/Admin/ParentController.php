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
        try {
            // Check if there are students selected
            if (!empty($request->student_id)) {
                // Store the parent data
                $parent = ParentRepository::storeByRequest($request);
                // Sync the student IDs with the parent using the pivot table
                // The $parent->children() is the relationship defined in the User model
                $parent->children()->sync($request->student_id);

                return back()->with('success', 'Parent has been created successfully!');
            } else {
                return back()->with('error', 'Please select students!');
            }
        } catch (\Exception $e) {
            return redirect(route('admin.parent.index'))->with('error', 'Error adding parent to the system: ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('backend.dashboard.parent.show', compact('user'));
    }
    public function edit(User $user)
    {
        $data['user'] = $user;
        $data['childs'] = Children::select('student_id')->where('parent_id', $user->id)->get()->toArray();
        $data['students'] = StudentRepository::query()->where('status', true)->where('admission_status', true)->where('status_type', true)->get();
        return view('backend.dashboard.parent.edit', $data);
    }

    public function update(ParentRequest $request, User $user)
    {
        if (!empty($request->student_id)) {
            ParentRepository::updateByRequest($request, $user);
            //update the children pivot table
            $childrenData = $request->student_id;
            $user->children()->sync($childrenData);
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
