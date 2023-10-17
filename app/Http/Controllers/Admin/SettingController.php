<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use PhotoTrait;
    public function aboutUs(){
        $row = AboutUs::first();
        return view('Admin/about-us/index',compact('row'));
    }

    public function updateAbout(request $request){
        $data = $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'desc_ar'  => 'required',
            'desc_en'  => 'required',
        ],[
            'required' => 'يرجي ملئ كل البيانات'
        ]);
        if($request->has('image') && $request->image != null)
            $data['image'] = $this->saveImage($request->image,'assets/uploads/setting','no');
        AboutUs::first()->update($data);
        toastr()->success('تم تحديث البيانات بنجاح');
        return back();
    }
}
