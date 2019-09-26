<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiLieuQuyTrinh extends Model
{
    protected $table = 'tai_lieu_quy_trinh';

    protected $fillable = ['ten','link','danh_gia','kpi_quytrinh_id'];

    public function kpi_quytrinh()
    {
        return $this->belongsTo(KPI_QuyTrinh::class,'kpi_quytrinh_id');
    }
}
