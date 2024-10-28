<?php

namespace App\Http\Controllers;

use App\Models\ParkingLot;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParkingLotRequest;
use App\Http\Requests\UpdateParkingLotRequest;

class ParkingLotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParkingLotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParkingLot $parkingLot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParkingLot $parkingLot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingLotRequest $request, ParkingLot $parkingLot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingLot $parkingLot)
    {
        //
    }
}
