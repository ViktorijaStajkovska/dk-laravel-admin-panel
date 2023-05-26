<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use DataTables;

class ContactController extends Controller
{
    public function contactTable()
    {
        $contacts = Contact::query();
        
    
        return DataTables::eloquent($contacts)->toJson();
    }

    public function index()
    {

        $contact = Contact::get();
    return view('contacts.index',compact('contact'));
        
    }

   
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
            $contact->delete();
    
        return redirect()->route('contacts.index')->with('success', 'Contact deleted!!');
    }
}
