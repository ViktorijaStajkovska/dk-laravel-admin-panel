<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VolunteerController extends Controller
{
    public function volunteerTable()
    {
        $volunteers = Volunteer::with('volunteerPosition');
        
    
        return DataTables::eloquent($volunteers)->toJson();
    }

    public function index()
    {
    return view('volunteers.index');
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        $volunteer_position = $volunteer->volunteerPosition;
        return view('volunteers.show', compact('volunteer', 'volunteer_position'));
    }

    
    public function destroy(string $id)
    {
        $volunteer = Volunteer::findOrFail($id);
        if(Storage::disk('public')->delete($volunteer->attachment)) {
            $volunteer->delete();
        }
        return redirect()->route('volunteers.index')->with('success', 'Volunteer deleted!!');
    }
}
