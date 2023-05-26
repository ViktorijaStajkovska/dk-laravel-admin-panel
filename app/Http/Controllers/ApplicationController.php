<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Donation;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Application_type;
use App\Models\Application_status;
use App\Models\Computer_equipment;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ApplicationRequest;

class ApplicationController extends Controller
{
    public function applicationTable()
{
    $applications = Application::with('computerEquipments', 'applicationType', 'applicationStatus');
   

    return DataTables::eloquent($applications)->toJson();
}
    /**
     * Display a listing of the resource.
     */
    public function index(Application $application)
    {
        $application_statuses = Application_status::get();
        $applications = Application::with('computerEquipments', 'applicationType', 'applicationStatus')->get();
        
        return view('applications.index', compact('applications', 'application_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $application_types = Application_type::get();
        $computer_equipments1 = Computer_equipment::where('application_type_id', 2)->get();
        $computer_equipments2 = Computer_equipment::where('application_type_id', 1)->get();;


       return view('applications.create', compact( 'application_types', 'computer_equipments1', 'computer_equipments2'));
    }

    public function show(Application $application)
    {
        
        $application_statuses = Application_status::get();
        $application->load('computerEquipments', 'applicationType', 'donation');
    
        return view('applications.show', compact('application', 'application_statuses'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Application $application)
    {
        $application_types = Application_type::get();
        $computer_equipments1 = Computer_equipment::where('application_type_id', 2)->get();
        $computer_equipments2 = Computer_equipment::where('application_type_id', 1)->get();;


       return view('applications.edit', compact( 'application_types', 'computer_equipments1', 'computer_equipments2', 'application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        
       
        $selectedOptions1 = $request->input('computer_equipment_id');
        
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

        
       $application->save();
       $application->computerEquipments()->sync($selectedOptions1);
           
           
            return to_route('applications.index')->with('success', 'Application successfully updated!');

    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
    $application->computerEquipments()->detach();
    if(Storage::disk('public')->delete($application->attachment1) || Storage::disk('public')->delete($application->attachment2)) {
        $application->delete();
    }
    return redirect()->route('applications.index')->with('success', 'Application deleted!!');
    
    }

    public function applicationStatus(Request $request, $id)
    {
        Application::where('id', $id)
        ->update([
            'application_status_id' => $request->application_status_id ,
            
        ]);

        return redirect()->back()->with('success', 'application status successfully added!');
    }
}
