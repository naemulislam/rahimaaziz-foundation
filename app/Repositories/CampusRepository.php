<?php

namespace App\Repositories;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusRepository extends Repository
{
    public static function model()
    {
        return Campus::class;
    }

    public static function storeByRequest(Request $request)
    {
        $file = $request->file('image');
        $document = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'campus' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/campus'), $fileName);
            $document = '/uploaded/campus/' . $fileName;
        }
        $campusCreate = self::create([
            'order' => $request->order,
            'image' => $document,
            'status' => true
        ]);
        return $campusCreate;
    }
    public static function updateByRequest(Request $request, Campus $campus)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'campus' . '_' . uniqid() . '.' . $extension;
            @unlink(public_path($campus->image));
            $file->move(public_path('uploaded/campus'), $fileName);
            $document = '/uploaded/campus/' . $fileName;
        }
        $campusUpdate = self::update($campus,[
            'order' => $request->order,
            'image' => $document ?? $campus->image,
        ]);
        return $campusUpdate;
    }
}
