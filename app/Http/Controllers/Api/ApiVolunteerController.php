<?php

namespace App\Http\Controllers\Api;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteerRequest;

class ApiVolunteerController extends Controller
{
    public function store(VolunteerRequest $request)
    {
        $volunteer = new Volunteer;
        $volunteer->name = $request->name;
        $volunteer->city = $request->city;
        $volunteer->email = $request->email;
        $volunteer->phone = $request->phone;
        
        if ($request->hasFile('attachment')) {

            $volunteer->attachment = $request->file('attachment')->store('volunteer-attachment', 'public');
            
        }
        $volunteer->description = $request->description;
        $volunteer->volunteer_position_id = $request->volunteer_position_id;

        
        if($volunteer->save()) {

            return response()->json(['success' => 'Volunteer created!!']);
        }

        return response()->json(['error' => 'Something bad happened!!']);
    }
}
