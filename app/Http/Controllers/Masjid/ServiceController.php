<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ServiceRepository::getAll();
        return view('backend.dashboard.service.index', compact('services'));
    }
    public function create()
    {
        return view('backend.dashboard.service.create');
    }
    public function store(ServiceRequest $request)
    {
        ServiceRepository::storeByRequest($request);
        return back()->with('success', 'Service is created successfully!');
    }
    public function edit(Service $service)
    {
        return view('backend.dashboard.service.edit', compact('service'));
    }
    public function update(ServiceRequest $request, Service $service)
    {
        ServiceRepository::updateByRequest($request, $service);
        return back()->with('success', 'Service is updated successfully!');
    }
    public function destroy(Service $service)
    {
        if ($service->document) {
            unlink(public_path($service->document));
        }
        $service->delete();
        return back()->with('success', 'Service is deleted successfully!');
    }
    public function status(Request $request, Service $service)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $service->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
}
