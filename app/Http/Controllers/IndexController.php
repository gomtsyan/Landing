<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Page;
use App\Worker;
use App\Portfolio;
use App\Service;
use App\ContactUs;
use DB;
use Mail;

class IndexController extends Controller
{

    public function execute(Request $request) {

        if($request->isMethod('post')){

            $messages = [
                'required' => 'field :attribute is required',
                'email' => 'field :attribute is not correct email'
            ];

            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ], $messages);

            $data = $request->all();

            $is_send = Mail::send('site.email', ['data'=>$data], function($message) use ($data) {

                $mail_admin = env('MAIL_ADMIN');

                $message->from($data['email'], $data['name']);
                $message->to($mail_admin);
                $message->subject('Question');

            });

            if($is_send){
                return redirect()->route('home')->with('status', 'Email sent');
            }

        }

        $pages = Page::all();
        $clients = Client::take(4)->get();
        $workers = Worker::take(5)->get();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Service::where('id', '<', 20)->get();
        $contactUs = ContactUs::get(['name', 'value']);

        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        $menu = [];

        foreach($pages as $page){
            array_push($menu, [
                'title'=>$page->name,
                'alias'=>$page->alias
            ]);
        }

        array_push($menu, [
            'title'=>'Services',
            'alias'=>'service'
        ]);

        array_push($menu, [
            'title'=>'Portfolio',
            'alias'=>'Portfolio'
        ]);

        array_push($menu, [
            'title'=>'Clients',
            'alias'=>'clients'
        ]);

        array_push($menu, [
            'title'=>'Team',
            'alias'=>'team'
        ]);

        array_push($menu, [
            'title'=>'Contact',
            'alias'=>'contact'
        ]);


        return view('site.index', [
            'pages'=>$pages,
            'clients'=>$clients,
            'workers'=>$workers,
            'portfolios'=>$portfolios,
            'services'=>$services,
            'contactUs'=>$contactUs,
            'menu'=>$menu,
            'tags'=>$tags
        ]);

    }

}
