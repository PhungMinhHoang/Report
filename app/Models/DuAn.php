<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuAn extends Model
{
    protected $table = 'du_an';

    public function don_vi()
    {
        return $this->belongsTo(DonVi::class,'donvi_id');
    }
}
