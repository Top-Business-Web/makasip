<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Site extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['share'];

    ##### social appends ####
    public function getShareAttribute()
    {
        return "https://www.facebook.com/sharer/sharer.php?u=".$this->attributes['url'];
    }

    ### Relations ###
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function type(){
        return $this->belongsTo(SiteType::class,'site_type','id');
    }

    public function views(){
        return $this->hasMany(SiteInfo::class,'site_id');
    }


    public function getPointsForClickAttribute()
    {
        return $this->attributes['points_for_click'];
    }


    public function getNeededClicksAttribute()
    {
        return ($this->attributes['needed_clicks'])? $this->attributes['needed_clicks'] : 0;
    }
    ### Scopes ###
    public function scopePreventedRows($query)
    {
        return $query->where('status','0')
            ->orWhere('needed_clicks', 0);
//            ->orWhere('user_id', Auth::id());
    }

    public function scopeAvailableRows($query)
    {
        return $query->where('needed_clicks' ,'>', 0)->where('status','1')->where('user_id','!=', Auth::guard('user')->id());
    }

}
