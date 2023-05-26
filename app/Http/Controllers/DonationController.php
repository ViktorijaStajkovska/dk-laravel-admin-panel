<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Application;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;

class DonationController extends Controller
{
    public function donationTable()
    {

        $donations = Donation::with('application');
    
        return DataTables::eloquent($donations)->toJson();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = Donation::with('application')->get();
      

        return view('donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $applications = Application::with('applicationType')->get();
        
        return view('donations.create', compact( 'applications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonationRequest $request)
    {
        
        $donations= new Donation;
        $donations->application_id = $request->application_id;
        $donations->donation_name = $request->donation_name;

        $donations->save();

        return to_route('donations.create')->with('success', 'Donations successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        $applications = Application::with('applicationType')->get();
        
        return view('donations.edit', compact( 'applications', 'donation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $donation->application_id = $request->application_id;
        $donation->donation_name = $request->donation_name;

        $donation->save();

        return to_route('donations.create')->with('success', 'Donations successfully eddited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
