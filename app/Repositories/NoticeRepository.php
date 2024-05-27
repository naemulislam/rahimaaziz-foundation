<?php

namespace App\Repositories;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Notice::class;
    }

    public static function storeByRequest(Request $request)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('document');
        $document = null;
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'notice'.'_'.uniqid(). '.' .$extension;
            $file->move(public_path('uploaded/notices'), $fileName);
            $document = '/uploaded/notices/'. $fileName;
        }
       $noticeCreate = self::create([
        'title' => $request->title,
        'slug' => $slug,
        'date' => $request->date,
        'description' => $request->description,
        'notice_type' => $request->notice_type,
        'document' => $document,
       ]);
       return $noticeCreate;
    }
    public static function updateByRequest(Request $request, Notice $notice)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('document');
        if($file){
            $extension = $file->getClientOriginalExtension();
            $fileName = 'notice'.'_'.uniqid(). '.' .$extension;
            @unlink(public_path($notice->document));
            $file->move(public_path('uploaded/notices'), $fileName);
            $document = '/uploaded/notices/'. $fileName;
        }
       $noticeupdate = self::update($notice,[
        'title' => $request->title,
        'slug' => $slug,
        'date' => $request->date,
        'description' => $request->description,
        'notice_type' => $request->notice_type,
        'document' => $document ?? $notice->document,
       ]);
       return $noticeupdate;
    }
}
