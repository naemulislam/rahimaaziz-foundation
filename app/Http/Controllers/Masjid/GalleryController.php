<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\MasjidGallery;
use App\Repositories\MasjidGalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = MasjidGalleryRepository::query()->orderBy('order', 'asc')->get();
        return view('backend.dashboard.masjid.gallery.index', compact('galleries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        MasjidGalleryRepository::storeByRequest($request);
        return back()->with('success', 'Gallery is created successfully!');
    }
    public function update(Request $request, MasjidGallery $masjidGallery)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);
        MasjidGalleryRepository::updateByRequest($request, $masjidGallery);
        return back()->with('success', 'Gallery is updated successfully!');
    }
    public function destroy(MasjidGallery $masjidGallery)
    {
        if ($masjidGallery->image) {
            unlink(public_path($masjidGallery->image));
        }
        $masjidGallery->delete();
        return back()->with('success', 'Gallery is deleted successfully!');
    }
    public function status(Request $request, MasjidGallery $masjidGallery)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $masjidGallery->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
