<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Services\PropertiesService;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    private PropertiesService $propertyservice;

    public function __construct(PropertiesService $service)
    {
        $this->middleware('auth');
        $this->propertyservice = $service;
    }

    public function create(CreatePropertyRequest $request)
    {
        $request->merge(['user_id'=> Auth::id()]);

        $this->propertyservice->create($request);

        return back()->with(['status'=>'Loan application  created successfully']);
    }

    public function read($id)
    {
        $post = $this->propertyservice->read($id);

        return view('edit', compact('post'));
    }

    public function update(UpdatePropertyRequest $request, $id)
    {
        $this->propertyservice->update($request, $id);

        return redirect()->back()->with('status', 'Property has been updated succesfully');
    }

    public function delete($id)
    {
        $this->propertyservice->delete($id);

        return back()->with(['status'=>'Deleted successfully']);
    }

    public function approve($id)
    {
        $this->propertyservice->approve($id);
        return back()->with(['status'=>'Approved successfully']);
    }

    public function reject($id)
    {
        $this->propertyservice->reject($id);
        return back()->with(['status'=>'Rejected successfully']);
    }
}
