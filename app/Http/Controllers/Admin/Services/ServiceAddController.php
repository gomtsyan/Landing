<?php

namespace App\Http\Controllers\Admin\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Service;

class ServiceAddController extends Controller
{

    public function execute(Request $request) {

        if($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required'=>':attribute is required'
            ];

            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'text'=>'required',
                'icon'=>'required'
            ],$messages);

            if($validator->fails()){
                return redirect()->route('serviceAdd')->withErrors($validator)->withInput();
            }


            $Service = new Service();

            $Service->fill($input);

            if($Service->save()){
                return redirect(route('services'))->with('status','Service successfuly added');
            }

        }

        if(view()->exists('admin.services.service_add')){

            $data = [
                'title'=>'New Service'
            ];

            return view('admin.services.service_add', $data);

        }

        abort(404);

    }

}
