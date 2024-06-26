<?php

namespace App\Repositories;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderRepository extends Repository
{
    public static function model()
    {
        return Slider::class;
    }

    public static function storeByRequest(Request $request)
    {
        $file = $request->file('image');
        $document = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'slider' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/slider'), $fileName);
            $document = '/uploaded/slider/' . $fileName;
        }
        $sliderCreate = self::create([
            'order' => $request->order,
            'image' => $document,
            'status' => true
        ]);
        return $sliderCreate;
    }
    public static function updateByRequest(Request $request, Slider $slider)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'slider' . '_' . uniqid() . '.' . $extension;
            @unlink(public_path($slider->image));
            $file->move(public_path('uploaded/slider'), $fileName);
            $document = '/uploaded/slider/' . $fileName;
        }
        $sliderUpdate = self::update($slider, [
            'order' => $request->order,
            'image' => $document ?? $slider->image,
        ]);
        return $sliderUpdate;
    }
}
