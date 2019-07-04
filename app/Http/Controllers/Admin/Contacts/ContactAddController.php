<?php

namespace App\Http\Controllers\Admin\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
use Validator;

class ContactAddController extends Controller
{
    public function execute(Request $request) {

        if($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required'=>':attribute is required',
            ];


            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'value' => 'required'

            ],$messages);

            if($validator->fails()){
                return redirect()->route('contactAdd')->withErrors($validator)->withInput();
            }



            $contact = new ContactUs();

            //$page->unguard($input); open all fields for add, update..

            $contact->fill($input);

            if($contact->save()){
                return redirect(route('contacts'))->with('status','Contact successfuly added');
            }


        }

        if(view()->exists('admin.contacts.contact_add')){

            $data = [
                'title'=>'New Contact'
            ];

            return view('admin.contacts.contact_add', $data);

        }

        abort(404);

    }
}
