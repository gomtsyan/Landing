<?php

namespace App\Http\Controllers\Admin\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Service;

class ServiceEditController extends Controller
{

    public function execute(Service $service, Request $request) {

        if($request->isMethod('delete')) {

            $service->delete();

            return redirect(route('services'))->with('status', 'Service deleted');

        }

        if($request->isMethod('post')) {

            $input =  $request->except('_token');

            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'text'=>'required',
                'icon'=>'required'
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('serviceEdit', ['service'=>$input['id']])
                    ->withErrors($validator);
            }


            $service->fill($input);

            if($service->update()) {

                return redirect(route('services'))->with('status', 'Service '.$input['name'].' updated');

            }

        }

        $old = $service->toArray();

        if(view()->exists('admin.services.service_edit')){

            $data = [
                'title'=>'Edit '.$old['name'].' Service',
                'old'=>$old
            ];

            return view('admin.services.service_edit', $data);

        }

        abort(404);

    }

}
