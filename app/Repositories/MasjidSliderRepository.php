<?php

namespace App\Repositories;

use App\Models\MasjidSlider;
use Illuminate\Http\Request;

class MasjidSliderRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return MasjidSlider::class;
    }

    public static function storeByRequest(Request $request)
    {
        $file = $request->file('image');
        $document = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'slider' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/masjid/slider'), $fileName);
            $document = '/uploaded/masjid/slider/' . $fileName;
        }
        $sliderCreate = self::create([
            'order' => $request->order,
            'image' => $document,
            'status' => true
        ]);
        return $sliderCreate;
    }
    public static function updateByRequest(Request $request, MasjidSlider $masjidSlider)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'slider' . '_' . uniqid() . '.' . $extension;
            @unlink(public_path($masjidSlider->image));
            $file->move(public_path('uploaded/masjid/slider'), $fileName);
            $document = '/uploaded/masjid/slider/' . $fileName;
        }
        $sliderUpdate = self::update($masjidSlider, [
            'order' => $request->order,
            'image' => $document ?? $masjidSlider->image,
        ]);
        return $sliderUpdate;
    }
}
