<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReasonReject extends Model
{
    use HasFactory;
    protected $table = 'reason_reject';
    protected $guarded = [];

    ### Relations ###
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function type(){
        return $this->belongsTo(Site::class,'site_id');
    }
}
