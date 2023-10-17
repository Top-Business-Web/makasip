<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiktokController extends Controller
{
    public function index($page){
        if($page == "followers"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(2);
            $type = request('page') ?? request('site_type');
            return view('site.Tiktok.followers', compact('data','type'));
        }
        elseif($page == "likes"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(3);
            $type = request('page') ?? request('site_type');
            return view('site.Tiktok.likes', compact('data', 'type'));
        }
        else{
            abort(404);
        }
    }
}
