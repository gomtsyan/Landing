<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;

class PagesAddController extends Controller
{

    public function execute(Request $request) {

        if($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required'=>':attribute is required',
                'unique'=>':attribute will be unique'
            ];


            $validator = Validator::make($input, [
                                                    'name'=>'required|max:255',
                                                    'alias'=>'required|unique:pages|max:255',
                                                    'text'=>'required',
                                                    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

                                                ],$messages);

            if($validator->fails()){
                return redirect()->route('pageAdd')->withErrors($validator)->withInput();
            }


            if($request->hasFile('images')){

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);

            }


            $page = new Page();

            //$page->unguard($input); open all fields for add, update..

            $page->fill($input);

            if($page->save()){
                return redirect(route('pages'))->with('status','Page successfuly added');
            }


        }

        if(view()->exists('admin.pages.pages_add')){

            $data = [
                'title'=>'New Page'
            ];

            return view('admin.pages.pages_add', $data);

        }

        abort(404);

    }

}
