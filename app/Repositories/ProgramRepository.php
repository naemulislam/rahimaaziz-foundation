<?php

namespace App\Repositories;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramRepository extends Repository
{
    public static function model()
    {
        return Program::class;
    }

    public static function storeByRequest(Request $request)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('document');
        $document = null;
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'program'.'_'.uniqid(). '.' .$extension;
            $file->move(public_path('uploaded/program'), $fileName);
            $document = '/uploaded/program/'. $fileName;
        }
       $programCreate = self::create([
        'title' => $request->title,
        'slug' => $slug,
        'description' => $request->description,
        'document' => $document,
       ]);
       return $programCreate;
    }
    public static function updateByRequest(Request $request, Program $program)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('document');
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'program'.'_'.uniqid(). '.' .$extension;
            @unlink(public_path($program->document));
            $file->move(public_path('uploaded/program'), $fileName);
            $document = '/uploaded/program/'. $fileName;
        }
       $programUpdate = self::update($program,[
        'title' => $request->title,
        'slug' => $slug,
        'description' => $request->description,
        'document' => $document ?? $program->document,
       ]);
       return $programUpdate;
    }
}
