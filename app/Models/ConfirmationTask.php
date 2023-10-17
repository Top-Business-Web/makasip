<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'site_id',
        'image',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
