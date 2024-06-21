<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutMadrasha;
use App\Models\AboutMasjid;
use App\Repositories\AboutMasjidRepository;
use App\Repositories\AboutRepository;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = AboutRepository::query()->latest()->first();
        return view('backend.dashboard.about.about', compact('data'));
    }

    public function update(Request $request, AboutMadrasha $aboutMadrasha)
    {
        $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg, jpeg|max:2048'
        ]);
        AboutRepository::storeByMadresha($request, $aboutMadrasha);
        return back()->with('success', 'Updated has been successfully!');
    }
    public function Masjidindex()
    {
        $data = AboutMasjidRepository::query()->latest()->first();
        return view('backend.dashboard.masjid.about.about', compact('data'));
    }

    public function Masjidupdate(Request $request, AboutMasjid $aboutMasjid)
    {
        $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg, jpeg|max:2048'
        ]);
        AboutMasjidRepository::storeByMasjid($request, $aboutMasjid);
        return back()->with('success', 'Updated has been successfully!');
    }
}
