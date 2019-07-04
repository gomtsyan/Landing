<?php

namespace App\Http\Controllers\Admin\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Validator;

class ClientAddController extends Controller
{
    public function execute(Request $request) {

        if($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required'=>':attribute is required',
            ];


            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ],$messages);

            if($validator->fails()){
                return redirect()->route('clientAdd')->withErrors($validator)->withInput();
            }


            if($request->hasFile('images')){

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);

            }


            $client = new Client();

            //$page->unguard($input); open all fields for add, update..

            $client->fill($input);

            if($client->save()){
                return redirect(route('clients'))->with('status','Client successfuly added');
            }


        }

        if(view()->exists('admin.clients.client_add')){

            $data = [
                'title'=>'New Client'
            ];

            return view('admin.clients.client_add', $data);

        }

        abort(404);

    }
}
