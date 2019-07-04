<?php

namespace App\Http\Controllers\Admin\Workers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WorkerController extends Controller
{
    public function execute() {

        if(view()->exists('admin.workers.workers')){
            $workers = \App\Worker::get()->toArray();

            $fields = array_keys($workers[0]);
            $fields = array_slice($fields, 3, -2);
            foreach (array_keys($fields, 'images') as $key) {
                unset($fields[$key]);
            }
            array_unshift($fields,'id', 'Full Name');
            array_push($fields, 'Created Date','Actions');


            $data = [
                'title' => 'Workers',
                'workers' => $workers,
                'fields' => $fields
            ];

            return view('admin.workers.workers', $data);
        }

        abort(404);

    }
}
