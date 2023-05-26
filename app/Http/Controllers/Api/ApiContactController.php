<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ApiContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->surname = $request->surname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->description = $request->description;

        
        if($contact->save()) {
           
            return response()->json(['success' => 'Contact created!!']);
        }

        return response()->json(['error' => 'Something bad happened!!']);
    }

}
