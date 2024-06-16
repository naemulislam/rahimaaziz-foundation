<?php

namespace App\Repositories;

use App\Models\MasjidGallery;
use Illuminate\Http\Request;

class MasjidGalleryRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return MasjidGallery::class;
    }

    public static function storeByRequest(Request $request)
    {
        $file = $request->file('image');
        $document = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gallery' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/masjid/gallery'), $fileName);
            $document = '/uploaded/masjid/gallery/' . $fileName;
        }
        $campusCreate = self::create([
            'order' => $request->order,
            'image' => $document,
            'status' => true
        ]);
        return $campusCreate;
    }
    public static function updateByRequest(Request $request, MasjidGallery $masjidGallery)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gallery' . '_' . uniqid() . '.' . $extension;
            @unlink(public_path($masjidGallery->image));
            $file->move(public_path('uploaded/masjid/gallery'), $fileName);
            $document = '/uploaded/masjid/gallery/' . $fileName;
        }
        $galleryUpdate = self::update($masjidGallery,[
            'order' => $request->order,
            'image' => $document ?? $masjidGallery->image,
        ]);
        return $galleryUpdate;
    }
}
