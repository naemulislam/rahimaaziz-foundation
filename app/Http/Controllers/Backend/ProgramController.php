<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use App\Repositories\ProgramRepository;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = ProgramRepository::getAll();
        return view('backend.dashboard.program.index', compact('programs'));
    }
    public function create()
    {
        return view('backend.dashboard.program.create');
    }
    public function store(ProgramRequest $request)
    {
        ProgramRepository::storeByRequest($request);
        return back()->with('success', 'Program is created successfully!');
    }
    public function edit(Program $program)
    {
        return view('backend.dashboard.program.edit', compact('program'));
    }
    public function update(ProgramRequest $request, Program $program)
    {
        ProgramRepository::updateByRequest($request, $program);
        return back()->with('success', 'Program is updated successfully!');
    }
    public function destroy(Program $program)
    {
        if ($program->document) {
            unlink(public_path($program->document));
        }
        $program->delete();
        return back()->with('success', 'Program is deleted successfully!');
    }
    public function status(Request $request, Program $program)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $program->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
