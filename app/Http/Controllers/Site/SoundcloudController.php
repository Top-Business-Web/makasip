<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoundcloudController extends Controller
{
    public function index($page){
        if($page == "follows"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(18);
            $type = request('page') ?? request('site_type');
            return view('site.SoundCloud.followers', compact('data', 'type'));
        }
        elseif($page == "likes"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(17);
            $type = request('page') ?? request('site_type');
            return view('site.SoundCloud.likes', compact('data', 'type'));
        }
        elseif($page == "plays"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(19);
            $type = request('page') ?? request('site_type');
            return view('site.SoundCloud.plays', compact('data', 'type'));
        }
        else{
            abort(404);
        }
    }
}
