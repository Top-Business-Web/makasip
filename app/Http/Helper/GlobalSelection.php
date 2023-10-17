<?php


namespace App\Http\Helper;


use App\Models\Site;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\Auth;

class GlobalSelection
{
    public function availableRows($site_type, $paginate = 'yes', $request_type = "web")
    {
        // استبعاد الاعلانات
        $preventedSites = Site::PreventedRows()->get();
        // dd($preventedSites);

        $sites = Site::AvailableRows()->get();
        // استبعاد الاعلانات اللي اليوزر شافها قبل كدا
        $info = SiteInfo::where('user_id', Auth::guard(($request_type == "web") ? 'user' : 'user-api')->id())->pluck('site_id')->toArray();
        $info = array_merge($preventedSites->pluck('id')->toArray(), $info);
        
        // استبعاد الاعلانات اللي وصلت للحد اليومي للمشاهدة
        foreach ($sites as $row) {
            $countOfViews = SiteInfo::whereDate('created_at', date('Y-m-d'))
                ->where('site_id', $row->id)
                ->count();
            if ($row->daily_clicks_limit <= $countOfViews) {
                array_push($info, $row->id);
            }
        }
        $preventedSitesIds = collect($info)->unique();
        

        // ارجاع الاعلانات فعالة مع استبعاد اعلانات المستخدمين المحظورين
        if ($paginate == 'yes') {
            return Site::with('type')->whereNotIn('id', $preventedSitesIds)
                ->where('user_id', '!=', auth()->user()->id)
                ->where('site_type', $site_type)
                ->orderBy('id', 'DESC')
                ->paginate(5);
        } 
        else {
            return Site::with('type')->whereNotIn('id', $preventedSitesIds)
                ->where('site_type', $site_type)
                ->orderBy('id', 'DESC')
                ->get();
        }
    }

}
