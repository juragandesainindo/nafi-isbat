<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jamaah()
    {
        return $this->hasMany(Jamaah::class);
    }

    // public function nafiIsbat()
    // {
    //     return $this->
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}