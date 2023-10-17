<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use GeneralTrait;
    public function index(){
        return $this->returnData('data',Country::all(),'');
    }
}
