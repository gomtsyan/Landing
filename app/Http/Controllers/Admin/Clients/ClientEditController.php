<?php

namespace App\Http\Controllers\Admin\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Validator;

class ClientEditController extends Controller
{
    public function execute(Client $client, Request $request) {

        if($request->isMethod('delete')) {

            $client->delete();

            return redirect(route('clients'))->with('status', 'Client deleted');

        }

        if($request->isMethod('post')) {

            $input =  $request->except('_token');

            $validator = Validator::make($input, [
                'name'=>'required|max:255',
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('clientEdit', ['client'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $file->getClientOriginalName());

            }else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $client->fill($input);

            if($client->update()) {

                return redirect(route('clients'))->with('status', 'Client '.$input['name'].' updated');

            }

        }

        $old = $client->toArray();

        if(view()->exists('admin.clients.client_edit')){

            $data = [
                'title'=>'Edit '.$old['name'].' Client',
                'old'=>$old
            ];

            return view('admin.clients.client_edit', $data);

        }

        abort(404);

    }
}
