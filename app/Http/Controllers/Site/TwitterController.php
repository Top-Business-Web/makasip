<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function tweets(){
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(5);
        $type = request('page') ?? request('site_type');
        return view('site.Twitter.tweets', compact('data', 'type'));
    }

    public function retweets(){
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(6);
        $type = request('page') ?? request('site_type');
        return view('site.Twitter.retweets', compact('data', 'type'));
    }

    public function followers(){
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(4);
        $type = request('page') ?? request('site_type');
        return view('site.Twitter.followers', compact('data', 'type'));
    }

    public function likes(){
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(8);
        $type = request('page') ?? request('site_type');
        return view('site.Twitter.likes', compact('data', 'type'));
    }
}
