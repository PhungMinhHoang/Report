<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DuAn extends Model
{
    protected $table = 'du_an';

    public function donVi()
    {
        return $this->belongsTo(DonVi::class,'don_vi_id');
    }
}
