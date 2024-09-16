<?php

namespace App\Http\Controllers\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateServiceRequest;

class ServiceController extends Controller
{
    public function services()
    {
        $services = Service::all();
        
        return view('admin.services', compact('services'));
        
    }

    public function addService ()
    {
        return view('admin.add-service');
    }

    public function createService (CreateServiceRequest $request)
    {
        
        $path = $request->file('image_filename')->store('public/Admin/img');
        $url = Storage::url($path);
        $service = Service::create([
            'title' => $request->title,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'image_filename' => $url
        ]);

        return redirect()->back()->with('message', 'Service Added Successfully');
    }

    public function editService($id)
    {
        $service = Service::find($id);
        return view('Admin.edit-service', compact('service'));
    }

    public function updateService (Request $request, $id)
    {
        
        if (Auth::id()) {
            $service = Service::find($id);
            $service->title = $request->title;
            $service->price = $request->price;
            $service->discount_price = $request->discount_price;
            $service->description = $request->description;

            $image = $request->image_filename;
            if ($image) {
                $path = $request->file('image_filename')->store('public/Admin/img/');
                $url = Storage::url($path);
                $service->image_filename = $url;
            }
            $service->save();

            return redirect()->back()->with('message', 'Service Updated Successfully');

        } else {
            return redirect('login');
        }
        

        
    }

    public function deleteService($id)
    {
        Service::destroy($id);

        return redirect()->back()->with('message', 'Service Deleted Successfully');
    }
}
