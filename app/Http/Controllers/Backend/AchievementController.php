<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AchievementRequest;
use App\Models\Achievement;
use App\Repositories\AchievementRepository;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = AchievementRepository::getAll();
        return view('backend.dashboard.achievement.index', compact('achievements'));
    }
    public function create()
    {
        return view('backend.dashboard.achievement.create');
    }
    public function store(AchievementRequest $request)
    {
        AchievementRepository::storeByRequest($request);
        return back()->with('success', 'Achievement is created successfully!');
    }
    public function edit(Achievement $achievement)
    {
        return view('backend.dashboard.achievement.edit', compact('achievement'));
    }
    public function update(AchievementRequest $request, Achievement $achievement)
    {
        AchievementRepository::updateByRequest($request, $achievement);
        return back()->with('success', 'Achievement is updated successfully!');
    }
    public function destroy(Achievement $achievement)
    {
        if ($achievement->document) {
            unlink(public_path($achievement->document));
        }
        $achievement->delete();
        return back()->with('success', 'Achievement is deleted successfully!');
    }
    public function status(Request $request, Achievement $achievement)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $achievement->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
