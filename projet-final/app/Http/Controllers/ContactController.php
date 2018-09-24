<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageCreated;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    //Méthode retournant la vue de la page contact
    public function create(){
        return view('front.contact');
    }

    public function store(Request $request){
        
        /*  
            -La méthode to() de la class Mail reçois une string permettant de définir le destinataire
            -La méthode send() reçoit  une instance du modèle ContactMessageCreated avec les paramètres à envoyer
        */
        Mail::to('admin@admin.fr')->send(new ContactMessageCreated($request->name, $request->email, $request->msg));

        redirect()->back()->with('flash_message', 'Votre message a bien été envoyé.');
        return redirect()->route('contact');//Une fois la requête réalisé on reste sur le formulaire de contacte
    }
}
