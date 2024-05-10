<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Validator;

class GroupController extends Controller
{
    public function index()
    {
        $data = GroupRepository::query()->orderBy('order','asc')->get();
        return view('backend.dashboard.academic.class.index', compact('data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:groups,name|max:30'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Not Inserted!');
        }
        GroupRepository::storeByRequest($request);
        return back()->with('success', 'Group is inserted successfully!');
    }
    public function update(Request $request, Group $group)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:groups,name|max:30'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Not Inserted!');
        }
        GroupRepository::updateByRequest($request, $group);
        return back()->with('success', 'Group is updated successfully!');
    }
    public function destroy(Group $group)
    {
        $group->delete();
        return back()->with('success', 'Group is deleted successfully!');
    }
    public function status(Request $request, Group $group)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $group->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
