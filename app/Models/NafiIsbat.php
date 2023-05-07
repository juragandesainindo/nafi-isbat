<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NafiIsbat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jamaah()
    {
        return $this->belongsTo(Jamaah::class);
    }

    public function paketNafiIsbat()
    {
        return $this->belongsTo(PaketNafiIsbat::class);
    }

    public function bayarNafiIsbat()
    {
        return $this->hasMany(BayarNafiIsbat::class);
    }
}
