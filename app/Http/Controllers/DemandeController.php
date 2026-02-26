<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdmin;
use App\Mail\DemandeAdmin;
use App\Mail\DemandeCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemandeController extends Controller
{
    public function storeDemande(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service' => 'required',
            'entreprise' => 'required',
            'activite' => 'required',
            'message' => 'required',
        ]);

        Mail::to($validated['email'])->send(new DemandeCustomer($validated));
        Mail::to('lumtechnologieexpertise@gmail.com')->send(new DemandeAdmin($validated));

        // You can save the data to the database or send an email here

        return response()->json(['message' => 'Demande submitted successfully']);
    }

    public function storeContact(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'sujet' => 'required',
            'message' => 'required',
        ]);

        Mail::to('lumtechnologieexpertise@gmail.com')->send(new ContactAdmin($validated));

        return response()->json(['message' => 'Contact submitted successfully']);
    }
}
