<?php

namespace App\Repositories;

use App\Models\AboutMasjid;
use Illuminate\Http\Request;

class AboutMasjidRepository extends Repository
{
    public static function model()
    {
        return AboutMasjid::class;
    }

    public static function storeByMasjid(Request $request, AboutMasjid $aboutMasjid)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'about'. '_' . uniqid() . '.' .$extension;
            if($aboutMasjid?->image){
                unlink(public_path($aboutMasjid->image));
            }
            $file->move(public_path('uploaded/masjid/about'), $fileName);
            $image = '/uploaded/masjid/about/' . $fileName;
        }
       $aboutMasjidData = self::query()->updateOrCreate(
        [
            'id' => $aboutMasjid->id ?? 0
        ],[
            'description' => $request->description,
            'image' =>  $image ?? $aboutMasjid?->image
        ]);
        return $aboutMasjidData;
    }
}
