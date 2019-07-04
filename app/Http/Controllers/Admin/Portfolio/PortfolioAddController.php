<?php

namespace App\Http\Controllers\Admin\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Portfolio;

class PortfolioAddController extends Controller
{
    public function execute(Request $request) {

        if($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required'=>':attribute is required'
            ];

            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'filter'=>'required|max:255',
                'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],$messages);

            if($validator->fails()){
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
            }


            if($request->hasFile('images')){

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);

            }

            $portfolio = new Portfolio();

            $portfolio->fill($input);

            if($portfolio->save()){
                return redirect(route('portfolio'))->with('status','Portfolio successfuly added');
            }


        }

        if(view()->exists('admin.portfolio.portfolio_add')){

            $data = [
                'title'=>'New Portfolio'
            ];

            return view('admin.portfolio.portfolio_add', $data);

        }

        abort(404);

    }
}
