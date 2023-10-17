<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SiteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteTypeController extends Controller
{
    public function index($id)
    {
        $siteType = SiteType::find($id);
        $data = (new \App\Http\Helper\GlobalSelection)->availableRows($id);
        $type = $id ?? request('site_type');
        return view('site.sites_types.my_site', compact('siteType', 'data', 'type'));
    }
}
