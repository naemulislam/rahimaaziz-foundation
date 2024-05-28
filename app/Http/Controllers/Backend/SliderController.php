<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = SliderRepository::query()->orderBy('order', 'asc')->get();
        return view('backend.dashboard.slider.index', compact('sliders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        SliderRepository::storeByRequest($request);
        return back()->with('success', 'Slider is created successfully!');
    }
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'order' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);
        SliderRepository::updateByRequest($request, $slider);
        return back()->with('success', 'Slider is updated successfully!');
    }
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            unlink(public_path($slider->image));
        }
        $slider->delete();
        return back()->with('success', 'Campus is deleted successfully!');
    }
    public function status(Request $request, Slider $slider)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $slider->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
