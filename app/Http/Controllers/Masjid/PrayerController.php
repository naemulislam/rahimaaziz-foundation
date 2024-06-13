<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\Prayer;
use App\Repositories\PrayerRepository;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function index()
    {
        $data = PrayerRepository::query()->latest()->first();
        return view('backend.dashboard.masjid.prayer.index', compact('data'));
    }

    public function update(Request $request, Prayer $prayer)
    {
        $request->validate([
            'fajar' => 'required|string',
            'dhuhr' => 'required|string',
            'asr' => 'required|string',
            'maghrib' => 'required|string',
            'isha' => 'required|string',
            'jummah' => 'required|string',
        ]);
        PrayerRepository::storeOrUpdateByRequest($request, $prayer);
        return back()->with('success', 'Prayer is updated successfully!');
    }
}
