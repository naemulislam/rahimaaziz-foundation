<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function masjidIndex(){
        return view('masjid.frontend.index');
    }
    public function masjidAbout(){
        return view('masjid.frontend.about');
    }
    public function masjidService(){
        return view('masjid.frontend.service');
    }
    public function masjidServiceDetails(){
        return view('masjid.frontend.service_details');
    }
    public function masjidGallery(){
        return view('masjid.frontend.gallery');
    }
}
