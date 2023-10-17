<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;

class OtherSitesController extends Controller
{
    public function index($page){
        if($page == "redditUpvotes"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(29);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.redditUpvotes', compact('data', 'type'));
        }
        elseif($page == "redditMembers"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(30);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.redditMembers', compact('data', 'type'));
        }
        elseif($page == "telegram"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(28);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.telegram', compact('data', 'type'));
        }
        elseif($page == "pinterestSave"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(14);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.pinterestSave', compact('data', 'type'));
        }
        elseif($page == "pinterestFollowers"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(15);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.pinterestFollowers', compact('data', 'type'));
        }
        elseif($page == "vkontakteGroups"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(20);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.vkontakteGroups', compact('data', 'type'));
        }
        elseif($page == "vkontaktePages"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(21);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.vkontaktePages', compact('data', 'type'));
        }
        elseif($page == "okGroup"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(22);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.okGroup', compact('data', 'type'));
        }
        elseif($page == "Reverbnation"){
            $data = (new \App\Http\Helper\GlobalSelection)->availableRows(23);
            $type = request('page') ?? request('site_type');
            return view('site.OtherSites.Reverbnation', compact('data', 'type'));
        }
        else{
            abort(404);
        }
    }

    public function activeMySite(Request $request)
    {
        $active = Site::findOrFail($request->get('id'));
        if($request->status == 1)
        {
             $active->update(['client_status' => $request->status]);
        }
        else
        {
            $active->update(['client_status' => $request->status]);
        }

        if($active) {
            return response()->json(['status' => 200]);
        }else
            return response()->json(['status' => 405]);
        }

}
