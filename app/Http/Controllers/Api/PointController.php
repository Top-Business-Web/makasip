<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Point;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PointController extends Controller
{
    use GeneralTrait, PhotoTrait;
    public function __construct()
    {
        $this->middleware('auth:user-api')->except('checkPay','payment_status');
    }

    public function latestPoints(request $request)
    {
        $data = Point::latest()->get()->take(4);
        return $this->returnData('data', $data);
    }

    public function allPoints(request $request)
    {
        $data = Point::all();
        return $this->returnData('data', $data);
    }

    public function pointsPrices(request $request)
    {
        $validator = Validator::make($request->all(), [
            'point_id' => 'required|exists:points,id',
            'user_id'  => 'required|exists:users,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $product = Point::findOrFail($request->point_id);
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data =
            "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=" . $product->price .
            "&currency=USD" .
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
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        Payment::create([
            'user_id'    => $request->user_id,
            'amount'     => $product->price,
            'product_id' => $product->id,
            'payment_id' => $responseData->id,
        ]);
        $data = route('api.pointsPrices',encrypt($request->point_id));
        return $this->returnData('data', $data);

    }


    public function pointsPay(request $request,$product_id)
    {
        $product = Point::findOrFail(decrypt($product_id));
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data =
            "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=".$product->price .
            "&currency=USD" .
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
            'user_id'      => Auth::guard('user-api')->id(),
            'amount'       => $product->price,
            'product_id'   => $product->id,
            'payment_id'   => $responseData->id,
        ]);
        return view('site.api.paymentForm',compact('responseData','product'));
    }

    public function checkPay(request $request){
//        dd($request->all());
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
                    User::find($request->user_id)->increment('balance', Point::find($pay->product_id)->number_of_points);
                    $data['success']= 'تم شراء النقاط بنجاح';
                    return redirect('/api/payment_status?status=1');
                }
            }
            else{
                return redirect('/api/payment_status?status=2');
            }
        }
        catch (\Exception $e){
//            toastError('عذرا حدث خطأ اثناء الدفع...');
//            return redirect(route('buyPoints'));
            return redirect('/api/payment_status?status=0');

        }

    }


    public function payment_status(){

    }

}
