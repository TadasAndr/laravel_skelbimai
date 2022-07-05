<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Ad extends Model
{
    use HasFactory;

    protected $table = 'ads';

    protected $fillable = ['ad_header','user_id', 'category_id', 'description', 'action', 'price', 'picture',
        'condition', 'phone_number', 'email', 'city_id', 'website', 'video'];

    public $timestamps = false;

    public function category() {
        $this->hasOne('App\Models\Category', 'category_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city() {
        $this->hasOne('App\Models\City', 'city_id');
    }
}
