<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use App\Repositories\NoticeRepository;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function create()
    {
        return view('backend.dashboard.notice.create');
    }
    public function store(NoticeRequest $request)
    {
        NoticeRepository::storeByRequest($request);
        return back()->with('success', 'Notice is created successfully!');
    }
    public function update(NoticeRequest $request, Notice $notice)
    {
        NoticeRepository::updateByRequest($request, $notice);
        return back()->with('success', 'Notice is updated successfully!');
    }
}
