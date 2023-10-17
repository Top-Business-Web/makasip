<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index($page){
        if($page == "subscribe"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(9);
            $type = request('page') ?? request('site_type');
            return view('site.Youtube.subscribes', compact('data', 'type'));
        }
        elseif($page == "likes"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(10);
            $type = request('page') ?? request('site_type');
            return view('site.Youtube.likes', compact('data', 'type'));
        }
        elseif($page == "views"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(11);
            $type = request('page') ?? request('site_type');
            return view('site.Youtube.views', compact('data', 'type'));
        }
        else{
            abort(404);
        }
    }
}
