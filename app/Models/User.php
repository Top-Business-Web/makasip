<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\DailyPoints;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded=[];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function dailyPoint()
    {
        return $this->hasMany(DailyPoint::class);
    }


    ##  Mutators and Accessors
    public function getImageAttribute()
    {
        return get_file($this->attributes['image']);
    }

    public function sites(){
        return $this->hasMany(Site::class,'user_id');
    }

    public function country_data(){
        return $this->belongsTo(Country::class,'country');
    }
    public function getJWTIdentifier(){


        return $this->getKey();
    }

    public function getJWTCustomClaims(){


        return [];
    }

}
