<?php

namespace App\Repositories;

use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerRepository extends Repository
{
    public static function model()
    {
        return Prayer::class;
    }

    public static function storeOrUpdateByRequest(Request $request, Prayer $prayer)
    {
       $prayerData = self::query()->updateOrCreate(
        [
            'id' => $prayer->id ?? 0
        ],[
           'fajar' => $request->fajar,
            'dhuhr' => $request->dhuhr,
            'asr' => $request->asr,
            'maghrib' => $request->maghrib,
            'isha' => $request->isha,
            'jummah' => $request->jummah,
        ]);
        return $prayerData;
    }
}
