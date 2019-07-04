<?php

namespace App\Http\Controllers\Admin\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Portfolio;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request) {

        if($request->isMethod('delete')) {

            $portfolio->delete();

            return redirect(route('portfolio'))->with('status', 'Portfolio deleted');

        }

        if($request->isMethod('post')) {

            $input =  $request->except('_token');

            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'filter'=>'required|max:255'

            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('portfolioEdit', ['portfolio'=>$input['id']])
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

            $portfolio->fill($input);

            if($portfolio->update()) {

                return redirect(route('portfolio'))->with('status', 'Portfolio '.$input['name'].' updated');

            }

        }

        $old = $portfolio->toArray();

        if(view()->exists('admin.portfolio.portfolio_edit')){

            $data = [
                'title'=>'Edit '.$old['name'].' Portfolio',
                'old'=>$old
            ];

            return view('admin.portfolio.portfolio_edit', $data);

        }

        abort(404);

    }
}
