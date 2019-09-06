<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table = 'don_vi';

    public function du_an()
    {
        return $this->hasMany(DuAn::class);
    }
}
