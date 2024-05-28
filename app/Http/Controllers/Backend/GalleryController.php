<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = GalleryRepository::query()->orderBy('order', 'asc')->get();
        return view('backend.dashboard.gallery.index', compact('galleries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        GalleryRepository::storeByRequest($request);
        return back()->with('success', 'Gallery is created successfully!');
    }
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);
        GalleryRepository::updateByRequest($request, $gallery);
        return back()->with('success', 'Gallery is updated successfully!');
    }
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            unlink(public_path($gallery->image));
        }
        $gallery->delete();
        return back()->with('success', 'Gallery is deleted successfully!');
    }
    public function status(Request $request, Gallery $gallery)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $gallery->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
