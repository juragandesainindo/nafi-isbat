<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarNafiIsbat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function nafiIsbat()
    {
        return  $this->belongsTo(NafiIsbat::class);
    }
}
