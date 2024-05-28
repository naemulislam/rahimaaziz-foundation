<?php

namespace App\Repositories;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AchievementRepository extends Repository
{
    public static function model()
    {
        return Achievement::class;
    }

    public static function storeByRequest(Request $request)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('document');
        $document = null;
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'achievement'.'_'.uniqid(). '.' .$extension;
            $file->move(public_path('uploaded/achievement'), $fileName);
            $document = '/uploaded/achievement/'. $fileName;
        }
       $achievementCreate = self::create([
        'title' => $request->title,
        'slug' => $slug,
        'date' => $request->date,
        'description' => $request->description,
        'document' => $document,
        'status' => true
       ]);
       return $achievementCreate;
    }
    public static function updateByRequest(Request $request, Achievement $achievement)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('document');
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'achievement'.'_'.uniqid(). '.' .$extension;
            @unlink(public_path($achievement->document));
            $file->move(public_path('uploaded/achievement'), $fileName);
            $document = '/uploaded/achievement/'. $fileName;
        }
       $achievementUpdate = self::update($achievement,[
        'title' => $request->title,
        'slug' => $slug,
        'date' => $request->date,
        'description' => $request->description,
        'document' => $document ?? $achievement->document,
       ]);
       return $achievementUpdate;
    }
}
