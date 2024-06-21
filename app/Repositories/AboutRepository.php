<?php

namespace App\Repositories;

use App\Models\AboutMadrasha;
use Illuminate\Http\Request;

class AboutRepository extends Repository
{
    public static function model()
    {
        return AboutMadrasha::class;
    }

    public static function storeByMadresha(Request $request, AboutMadrasha $aboutMadrasha)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'about'. '_' . uniqid() . '.' .$extension;
            if($aboutMadrasha?->image){
                unlink(public_path($aboutMadrasha->image));
            }
            $file->move(public_path('uploaded/about'), $fileName);
            $image = '/uploaded/about/' . $fileName;
        }
       $aboutMadrashaData = self::query()->updateOrCreate(
        [
            'id' => $aboutMadrasha->id ?? 0
        ],[
            'description' => $request->description,
            'image' =>  $image ?? $aboutMadrasha?->image
        ]);
        return $aboutMadrashaData;
    }
}
