<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Models\Video;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;

class ApiApplicationController extends Controller
{

    
   
    public function store(ApplicationRequest $request)
    {
    $selectedOptions1 = $request->input('computer_equipment_id');

        $application = new Application;
        $application->name = $request->name;
        $application->surname = $request->surname;
        $application->city = $request->city;
        $application->email = $request->email;
        $application->phone = $request->phone;
        if ($request->hasFile('attachment1')) {

            $application->attachment1 = $request->file('attachment1')->store('application-attachment', 'public');
            
        }
        if ($request->hasFile('attachment2')) {

            $application->attachment2 = $request->file('attachment2')->store('application-attachment', 'public');
            
        }
        $application->description = $request->description;
        $application->application_type_id = $request->application_type_id;

        
        if($application->save()) {
        $application->computerEquipments()->attach($selectedOptions1);
           

            return response()->json(['success' => 'Application created!!']);
        }

        return response()->json(['error' => 'Something bad happened!!']);
    }

    public function archive(Application $application)
    {
    
        $application->archive = 1;
        $application->save();
        return response()->json(['success' => 'Application has been archived!']);
    }


   

 
   
}
