<?php

namespace App\Http\Controllers\Admin\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function execute() {

        if(view()->exists('admin.contacts.contacts')){
            $contacts = \App\ContactUs::get()->toArray();

            /*$fields = array();

            foreach($contacts as $contact){
                array_push($fields, $contact['name']);
            }*/


            $fields = array_keys($contacts[0]);
            $fields = array_slice($fields, 0, -2);


            array_push($fields, 'Created Date','Actions');


            $data = [
                'title' => 'Contacts',
                'contacts' => $contacts,
                'fields' => $fields
            ];

            return view('admin.contacts.contacts', $data);
        }

        abort(404);

    }
}
