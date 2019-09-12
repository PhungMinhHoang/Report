<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table = 'don_vi';


    public function du_an()
    {
        return $this->hasMany(DuAn::class);
    }
    public function kpi_veco()
    {
        return $this->hasMany(KPI_Veco::class);
    }
}
