<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PagesController extends Controller
{

    public function execute() {

        if(view()->exists('admin.pages.pages')){
            $pages = \App\Page::get()->toArray();

            $fields = array_keys($pages[0]);
            $fields = array_slice($fields, 0, -2);
            foreach (array_keys($fields, 'images') as $key) {
                unset($fields[$key]);
            }
            array_push($fields, 'Created Date','Actions');


            $data = [
                'title' => 'Pages',
                'pages' => $pages,
                'fields' => $fields
            ];

            return view('admin.pages.pages', $data);
        }

        abort(404);

    }

}
