<?php

namespace App\Http\Controllers\Admin\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    public function execute() {

        if(view()->exists('admin.services.services')){
            $services = \App\Service::get()->toArray();

            $fields = array_keys($services[0]);
            $fields = array_slice($fields, 0, -2);

            array_push($fields, 'Created Date','Actions');


            $data = [
                'title' => 'Services',
                'services' => $services,
                'fields' => $fields
            ];

            return view('admin.services.services', $data);
        }

        abort(404);

    }

}
