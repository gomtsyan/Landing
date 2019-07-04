<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request) {

        if($request->isMethod('delete')) {

            $page->delete();

            return redirect(route('pages'))->with('status', 'Page deleted');

        }

        if($request->isMethod('post')) {

            $input =  $request->except('_token');

            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'alias'=>'required|max:255|unique:pages,alias,'.$input['id'],
                'text'=>'required'
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('pageEdit', ['page'=>$input['id']])
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

            $page->fill($input);

            if($page->update()) {

                return redirect(route('pages'))->with('status', 'Page '.$input['name'].' updated');

            }

        }

        if($page){

            $old = $page->toArray();

            if(view()->exists('admin.pages.pages_edit')){

                $data = [
                    'title'=>'Edit '.$old['name'].' Page',
                    'old'=>$old
                ];

                return view('admin.pages.pages_edit', $data);

            }

        }

        abort(404);

    }
}
