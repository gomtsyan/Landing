<?php

namespace App\Http\Controllers\Admin\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
use Validator;

class ContactEditController extends Controller
{
    public function execute(ContactUs $contact, Request $request) {

        if($request->isMethod('delete')) {

            $contact->delete();

            return redirect(route('contacts'))->with('status', 'Contact deleted');

        }

        if($request->isMethod('post')) {

            $input =  $request->except('_token');

            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'value'=>'required',
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('contactEdit', ['contact'=>$input['id']])
                    ->withErrors($validator);
            }

            $contact->fill($input);

            if($contact->update()) {

                return redirect(route('contacts'))->with('status', 'Contact '.$input['name'].' updated');

            }

        }

        $old = $contact->toArray();

        if(view()->exists('admin.contacts.contact_edit')){

            $data = [
                'title'=>'Edit '.$old['name'].' Contact',
                'old'=>$old
            ];

            return view('admin.contacts.contact_edit', $data);

        }

        abort(404);

    }
}
