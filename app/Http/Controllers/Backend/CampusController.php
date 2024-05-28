<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Repositories\CampusRepository;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = CampusRepository::query()->orderBy('order', 'asc')->get();
        return view('backend.dashboard.campus.index', compact('campuses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        CampusRepository::storeByRequest($request);
        return back()->with('success', 'Campus is created successfully!');
    }
    public function update(Request $request, Campus $campus)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);
        CampusRepository::updateByRequest($request, $campus);
        return back()->with('success', 'Campus is updated successfully!');
    }
    public function destroy(Campus $campus)
    {
        if ($campus->image) {
            unlink(public_path($campus->image));
        }
        $campus->delete();
        return back()->with('success', 'Campus is deleted successfully!');
    }
    public function status(Request $request, Campus $campus)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $campus->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
