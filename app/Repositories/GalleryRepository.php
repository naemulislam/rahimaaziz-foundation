<?php

namespace App\Repositories;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryRepository extends Repository
{
    public static function model()
    {
        return Gallery::class;
    }

    public static function storeByRequest(Request $request)
    {
        $file = $request->file('image');
        $document = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gallery' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/gallery'), $fileName);
            $document = '/uploaded/gallery/' . $fileName;
        }
        $campusCreate = self::create([
            'order' => $request->order,
            'image' => $document,
            'status' => true
        ]);
        return $campusCreate;
    }
    public static function updateByRequest(Request $request, Gallery $gallery)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gallery' . '_' . uniqid() . '.' . $extension;
            @unlink(public_path($gallery->image));
            $file->move(public_path('uploaded/gallery'), $fileName);
            $document = '/uploaded/gallery/' . $fileName;
        }
        $galleryUpdate = self::update($gallery,[
            'order' => $request->order,
            'image' => $document ?? $gallery->image,
        ]);
        return $galleryUpdate;
    }
}
