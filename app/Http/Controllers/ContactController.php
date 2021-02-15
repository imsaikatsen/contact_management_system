<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function create(){
        return view('contacts.create');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $contact = Contact::with('contact_numbers')->whereHas('contact_numbers', function($q) use($search){
               $q->where('contact_numbers.number','like','%'.$search.'%');
                })
            ->get();

        return view('contacts.list',['contacts'=>$contact]);
    }

    public function store(Request $request){

        $photo = $request->file('photo');
        $input['photoname'] = time().'.'.$photo->getClientOriginalExtension();
        $destinationPath = public_path('upload/contact_images');
        $photo->move($destinationPath, $input['photoname']);

        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->salutation = $request->salutation;
        $contact->date_of_birth = $request->date_of_birth;
        $contact->email = $request->email;
        $contact->user_id = Auth::user()->id;

       $contact->photo = $input['photoname'];
       $contact->save();

        $numbersArr = [];
        foreach ($request->number as $num) {
            $numbersArr[] = new ContactNumber(['number'=>$num, 'user_id'=>Auth::user()->id, 'type'=>$request->type]);
        }

        $contact->contact_numbers()->saveMany($numbersArr);
        return redirect()->route('list');


    }



    public function show(){

        $contact = Contact::with('contact_numbers')->orderBy('id', 'DESC')->get();
        return view('contacts.list',['contacts'=>$contact]);
    }
}
