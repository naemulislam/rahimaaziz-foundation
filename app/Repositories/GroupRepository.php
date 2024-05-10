<?php

namespace App\Repositories;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Group::class;
    }

    public static function storeByRequest(Request $request): Group
    {
        $createGroup = self::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => $request->order,
            'status' => true
        ]);
        return $createGroup;
    }

    public static function updateByRequest(Request $request, Group $group): Group
    {
        $group->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => $request->order,
        ]);
        return $group;
    }
}
