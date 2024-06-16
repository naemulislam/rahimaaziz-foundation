<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceRepository extends Repository
{
    public static function model()
    {
        return Service::class;
    }

    public static function storeByRequest(Request $request)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('image');
        $image = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'service' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/masjid/service'), $fileName);
            $image = '/uploaded/masjid/service/' . $fileName;
        }
        $file = $request->file('icon');
        $icon = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'icon' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/masjid/service'), $fileName);
            $icon = '/uploaded/masjid/service/' . $fileName;
        }
        $serviceCreate = self::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $image,
            'icon' => $icon,
            'status' => true
        ]);
        return $serviceCreate;
    }
    public static function updateByRequest(Request $request, Service $service)
    {
        $slug = Str::slug($request->title);
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'service' . '_' . uniqid() . '.' . $extension;
            @unlink(public_path($service->image));
            $file->move(public_path('uploaded/masjid/service'), $fileName);
            $image = '/uploaded/masjid/service/' . $fileName;
        }
        $file = $request->file('icon');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'icon' . '_' . uniqid() . '.' . $extension;
            @unlink(public_path($service->icon));
            $file->move(public_path('uploaded/masjid/service'), $fileName);
            $icon = '/uploaded/masjid/service/' . $fileName;
        }
        $serviceUpdate = self::update($service, [
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $image ?? $service->image,
            'icon' => $icon ?? $service->icon,
        ]);
        return $serviceUpdate;
    }
}
