<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function index(){
        return view('masjid.frontend.index');
    }
}
