<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Repositories\MasjidGalleryRepository;
use App\Repositories\MasjidSliderRepository;
use App\Repositories\PrayerRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function masjidIndex(){
        $data['sliders'] = MasjidSliderRepository::query()->where('status', true)->orderBy('order', 'asc')->get();
        $data['services'] = ServiceRepository::query()->where('status', true)->get();
        $data['prayer'] = PrayerRepository::first();
        return view('masjid.frontend.index',$data);
    }
    public function masjidAbout(){
        return view('masjid.frontend.about');
    }
    public function masjidService(){
        $data['services'] = ServiceRepository::query()->where('status', true)->get();
        return view('masjid.frontend.service', $data);
    }
    public function masjidServiceDetails($slug){
        $service = ServiceRepository::query()->where('slug', $slug)->first();
        return view('masjid.frontend.service_details', compact('service'));
    }
    public function masjidGallery(){
        $data['galleries'] = MasjidGalleryRepository::query()->where('status', true)->orderBy('order', 'asc')->get();
        return view('masjid.frontend.gallery', $data);
    }
}
