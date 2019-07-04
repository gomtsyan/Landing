<?php

namespace App\Http\Controllers\Admin\Workers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Worker;
use Validator;

class WorkerEditController extends Controller
{
    public function execute(Worker $worker, Request $request) {

        if($request->isMethod('delete')) {

            $worker->delete();

            return redirect(route('workers'))->with('status', 'Worker deleted');

        }

        if($request->isMethod('post')) {

            $input =  $request->except('_token');

            $validator = Validator::make($input, [
                'firstName'=>'required|max:255',
                'lastName'=>'required|max:255',
                'position'=>'required|max:255',
                'text'=>'required'
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('workerEdit', ['worker'=>$input['id']])
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

            $worker->fill($input);

            if($worker->update()) {

                return redirect(route('workers'))->with('status', 'Worker '.$input['firstName'].' updated');

            }

        }

        $old = $worker->toArray();

        if(view()->exists('admin.workers.workers_edit')){

            $data = [
                'title'=>'Edit '.$old['firstName'].' Worker',
                'old'=>$old
            ];

            return view('admin.workers.workers_edit', $data);

        }

        abort(404);

    }
}
