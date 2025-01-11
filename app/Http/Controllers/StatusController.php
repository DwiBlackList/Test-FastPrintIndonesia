<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Status::all();
        
        return view('status.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $status = new Status();
        $status->nama_status = $request->nama_status;
        $status->save();

        return redirect()->route('status.index')->with('success', 'Status added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->nama_status = $request->nama_status;
        $status->save();

        return redirect()->route('status.index')->with('success', 'Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('status.index')->with('success', 'Status deleted successfully.');
    }
}