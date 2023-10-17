<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Helper\GlobalSelection;
use App\Models\Site;
use App\Models\SiteInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    
    public function facebookShare()
    {
        // Show Only Rows That doesn't reach to today's limit and user didn't watch it yet
        // and needed clicks more than 0
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(25);
        $type = request('site_type');
        return view('site.facebook.facebookShare', compact('data', 'type'));
    }

    public function facebookFollowers()
    {
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(26);
        $type = request('site_type');
        return view('site.facebook.facebook-followers', compact('data', 'type'));
    }

    public function facebookPostLike()
    {
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(27);
        $type = request('page') ?? request('site_type');
        return view('site.facebook.facebook-post-like', compact('data', 'type'));
    }

    public function facebookPostShare(){
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows(24);
        $type = request('page') ?? request('site_type');
        return view('site.facebook.facebookPostShare', compact('data', 'type'));
    }

    public function checkUserView(request $request)
    {
//        return $request;
        $site = Site::find($request->site_id);
        SiteInfo::create([
            'site_id' => $request->site_id,
            'user_id' => Auth::guard('user')->id(),
        ]);
        $site->decrement('needed_clicks');
        User::find(Auth::guard('user')->id())->increment('balance', $site->points_for_click);
        return response()->json([
            'status' => 200,
            'row_id' => $site->id,
            'btn_src' => $site->url,
            'points' => $site->points_for_click,
            'daily_clicks_limit' => $site->daily_clicks_limit,
        ]);
    }

}
