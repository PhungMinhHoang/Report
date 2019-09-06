<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DuAn extends Model
{
    protected $table = 'du_an';

    public function don_vi()
    {
        return $this->belongsTo(DonVi::class,'donvi_id');
    }
}
