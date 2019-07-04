<?php

namespace App\Http\Controllers\Admin\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function execute() {

        if(view()->exists('admin.clients.clients')){
            $clients = \App\Client::get()->toArray();

            $fields = array_keys($clients[0]);
            $fields = array_slice($fields, 0, -2);


            array_push($fields, 'Created Date','Actions');


            $data = [
                'title' => 'Services',
                'clients' => $clients,
                'fields' => $fields
            ];

            return view('admin.clients.clients', $data);
        }

        abort(404);

    }
}
