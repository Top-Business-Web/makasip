<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function followers()
    {
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(31);
        $type = request('page') ?? request('site_type');
        return view('site.Instagram.followers', compact('data', 'type'));
    }


    public function likes()
    {
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(1);
        $type = request('page') ?? request('site_type');
        return view('site.Instagram.likes', compact('data', 'type'));
    }
}
