<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\GeneralTrait;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use GeneralTrait,PhotoTrait;
    public function setting(){
        return $this->returnData('data',Setting::first(),'');
    }
}
