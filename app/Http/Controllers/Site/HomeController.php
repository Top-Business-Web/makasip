<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSite;
use App\Models\AboutUs;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Service;
use App\Models\SettingPoint;
use App\Models\Site;
use App\Models\SiteCountry;
use App\Models\SiteType;
use App\Models\Slider;
use App\Models\User;
use Facebook\Facebook;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Campaign;
use FacebookAds\Object\AdSet;
use FacebookAds\Object\AdCreative;
use FacebookAds\Object\Ad;
use FacebookAds\Object\AdPreview;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function test()
    {

    }
    public function index(){

        if (Auth::guard('user')->check()) {
            return redirect()->route('homepage');
        } else {
            $data['sliders']  = Slider::all();
            $data['services'] = Service::all();
            $data['about']    = AboutUs::first();
            return view('site.index',compact('data'));
        }
    }


    public function homepage(){
        $data['setting_points_1'] = SettingPoint::first();
        $data['setting_points_2'] = SettingPoint::find(2);
        $data['setting_points_3'] = SettingPoint::find(3);
        $data['setting_points_4'] = SettingPoint::find(4);
        $data['setting_points_5'] = SettingPoint::find(5);
        return view('site.HomePage.index', $data);
    }

    public function MySites(){

        $sites = Site::where('user_id',Auth::user()->id)->latest()->get();
        $type = request('test') ?? request('site_type');
        return view('site.my_sites',compact('sites', 'type'));
    }

    public function deleteMySite(request $request){
        $site = Site::where([['id',$request->id],['user_id',Auth::user()->id]])->first();
        if($site){
            $site->delete();
            return response()->json(['status' => 200,]);
        }
        else
            return response()->json(['status' => 405,]);
    }

    public function AddSite($type){
//        $user = SiteType::orderBy('title_'.App::getLocale(),'ASC')->get();
        $sites = SiteType::orderBy('title_'.App::getLocale(),'ASC')->get();
        $countries = Country::orderBy(App::getLocale().'_name','ASC')->get();
        return view('site.add_site',compact('sites','countries', 'type'));
    }

    public function publishMySite(StoreSite $request){
//        dd($request->all());
        $user = Auth::user();
        $user->balance = $user->balance - $request->total_clicks_limit;
        $user->save();
        $site = Site::updateOrCreate([
            'user_id'             => Auth::user()->id,
            'site_type'           => $request->site_type,
            'title'               => $request->title,
            'url'                 => $request->url,
            'total_clicks_limit'  => $request->total_clicks_limit,
            'needed_clicks'       => $request->total_clicks_limit,
            'daily_clicks_limit'  => $request->daily_clicks_limit,
            'points_for_click'    => $request->points_for_click,
        ]);

        foreach ($request->country as $row){
            SiteCountry::create([
                'site_id'    => $site->id,
                'country_id' => $row,
            ]);
        }
        return response()->json([
            'status' => 200,
        ]);
    }

    public function subscription(){
        return view('site.subscription');
    }

    public function buyPoints(){
        $points = Point::all();
        return view('site.buy_points',compact('points'));
    }


    public function pointsPrices($product_id) {
        $product = Point::findOrFail(decrypt($product_id));
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data =
            "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=".$product->price .
            "&currency=EGP" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        Payment::create([
            'user_id'      => Auth::user()->id,
            'amount'       => $product->price,
            'product_id'   => $product->id,
            'payment_id'   => $responseData->id,
        ]);
        return view('site.paymentForm',compact('responseData','product'));
    }

    public function checkPay(request $request){
        try{
            $url = "https://eu-test.oppwa.com".$request->resourcePath;
            $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            $response = json_decode($responseData);
            if($response->result->code == '000.100.110'){
                $pay = Payment::where('payment_id',$response->ndc)->first();
                if($pay){
                    $pay->update(['status' => 1]);
                    User::find(Auth::guard('user')->id())->increment('balance', Point::find($pay->product_id)->number_of_points);
                    toastSuccess('تم شراء النقاط بنجاح');
                    return redirect(route('profile'));
                }
            }
            else{
                toastError('عذرا حدث خطأ اثناء الدفع...');
                return back();
            }
        }
        catch (\Exception $e){
            toastError('عذرا حدث خطأ اثناء الدفع...');
            return redirect(route('buyPoints'));
        }

    }


}
