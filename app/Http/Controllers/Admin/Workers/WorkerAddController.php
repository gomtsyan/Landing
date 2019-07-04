<?php

namespace App\Http\Controllers\Admin\Workers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Worker;
use Validator;

class WorkerAddController extends Controller
{
    public function execute(Request $request) {

        if($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required'=>':attribute is required'
            ];


            $validator = Validator::make($input, [
                'firstName'=>'required|max:255',
                'lastName'=>'required|max:255',
                'position'=>'required|max:255',
                'text'=>'required',
                'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ],$messages);

            if($validator->fails()){
                return redirect()->route('workerAdd')->withErrors($validator)->withInput();
            }


            if($request->hasFile('images')){

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);

            }


            $worker = new Worker();

            //$page->unguard($input); open all fields for add, update..

            $worker->fill($input);

            if($worker->save()){
                return redirect(route('workers'))->with('status','Worker successfuly added');
            }


        }

        if(view()->exists('admin.workers.workers_add')){

            $data = [
                'title'=>'New Worker'
            ];

            return view('admin.workers.workers_add', $data);

        }

        abort(404);

    }
}
