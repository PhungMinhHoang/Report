<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KPI_Veco extends Model
{
    protected $table = 'kpi_veco';

    protected $fillable = ['don_vi_id','tuy_chon_id','chi_so','thoi_gian'];

    public function don_vi()
    {
        return $this->belongsTo(DonVi::class,'don_vi_id');
    }
    public function tuy_chon()
    {
        return $this->belongsTo(TuyChon::class,'tuy_chon_id');
    }
}
