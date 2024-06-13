<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\MasjidSlider;
use App\Repositories\MasjidSliderRepository;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $masjidSliders = MasjidSliderRepository::query()->orderBy('order', 'asc')->get();
        return view('backend.dashboard.masjid.slider.index', compact('masjidSliders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        MasjidSliderRepository::storeByRequest($request);
        return back()->with('success', 'Slider is created successfully!');
    }
    public function update(Request $request, MasjidSlider $masjidSlider)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);
        MasjidSliderRepository::updateByRequest($request, $masjidSlider);
        return back()->with('success', 'Slider is updated successfully!');
    }
    public function destroy(MasjidSlider $masjidSlider)
    {
        if ($masjidSlider->image) {
            unlink(public_path($masjidSlider->image));
        }
        $masjidSlider->delete();
        return back()->with('success', 'Slider is deleted successfully!');
    }
    public function status(Request $request, MasjidSlider $masjidSlider)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $masjidSlider->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
