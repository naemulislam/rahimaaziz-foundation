<?php

namespace App\Repositories;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsRepository extends Repository
{
    public static function model()
    {
        return News::class;
    }

    public static function storeByRequest(NewsRequest $request){
        $file = $request->file('document');
        $document = null;
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'news'.'_'.uniqid(). '.' .$extension;
            $file->move(public_path('uploaded/news'), $fileName);
            $document = '/uploaded/news/'. $fileName;
        }

        $create = self::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'date' => $request->date,
            'document' => $document,
            'status' => true
        ]);
        return $create;
    }
    public static function updateByRequest(NewsRequest $request, News $news){
        $file = $request->file('document');
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'news'.'_'.uniqid(). '.' .$extension;
            unlink(public_path($news->document));
            $file->move(public_path('uploaded/news'), $fileName);
            $document = '/uploaded/news/'. $fileName;
        }
        $update = self::update($news,[
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'date' => $request->date,
            'document' => $document ?? $news->document,
        ]);
        return $update;
    }
}
