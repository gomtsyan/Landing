<?php

namespace App\Http\Controllers\Admin\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{

    public function execute() {

        if(view()->exists('admin.portfolio.portfolio')){

            $portfolios = \App\Portfolio::get()->except('id')->toArray();

            $fields = array_keys($portfolios[0]);
            $fields = array_slice($fields, 0, -2);
            /*foreach (array_keys($fields, 'images') as $key) {
                unset($fields[$key]);
            }*/
            array_push($fields, 'Created Date','Actions');


            $data = [
                'title' => 'Portfolios',
                'portfolios' => $portfolios,
                'fields' => $fields
            ];

            return view('admin.portfolio.portfolio', $data);
        }

        abort(404);

    }

}
