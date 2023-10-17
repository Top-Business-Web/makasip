<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSite;
use App\Models\Site;
use App\Models\SiteCountry;
use App\Models\SiteInfo;
use App\Models\SiteType;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth:user-api');
    }

    public function addPost(request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            "site_type" => 'required|exists:site_types,id',
            "title" => 'required|max:255',
            "country" => 'required|array',
            "url" => 'required',
            "total_clicks_limit" => 'required|numeric|min:1|gte:daily_clicks_limit',
            "daily_clicks_limit" => 'required|numeric|min:1',
            "points_for_click" => 'required|numeric|min:5|max:50',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $site = Site::updateOrCreate([
            'user_id' => $request->user_id,
            'site_type' => $request->site_type,
            'title' => $request->title,
            'url' => $request->url,
            'total_clicks_limit' => $request->total_clicks_limit,
            'daily_clicks_limit' => $request->daily_clicks_limit,
            'points_for_click' => $request->points_for_click,
        ]);

        foreach ($request->country as $row) {
            SiteCountry::create([
                'site_id' => $site->id,
                'country_id' => $row,
            ]);
        }

        return $this->returnData('data', $site, 'تم الاضافة بنجاح');

    }

    public function postTypes()
    {
        $data = SiteType::all();
        return $this->returnData('data', $data);

    }

    public function posts(request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_id' => 'required|exists:site_types,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $data = (new \App\Http\Helper\GlobalSelection)->availableRows($request->type_id,'no','api');

        return $this->returnData('posts', $data, '');
    }

    public function mySites(request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $data = Site::with('type')->where('user_id',$request->user_id)->get();

        return $this->returnData('data', $data, '');
    }


    public function deleteMySite(request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_id' => 'required|exists:sites,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        Site::find($request->site_id)->delete();

        return $this->returnSuccessMessage('تم الحذف بنجاح');
    }

    public function checkUserView(request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_id' => 'required|exists:sites,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $site = Site::find($request->site_id);
        SiteInfo::create([
            'site_id' => $request->site_id,
            'user_id' => $request->user_id,
        ]);
        $site->decrement('needed_clicks', 1);
        User::find($request->user_id)->increment('balance', $site->points_for_click);
        User::find($site->user_id)->decrement('balance', $site->points_for_click);
       $data = [
            'site_id' => $site->id,
            'btn_src' => $site->url,
            'points'  => $site->points_for_click,
        ];

       return $this->returnData('data',$data);
    }


}
