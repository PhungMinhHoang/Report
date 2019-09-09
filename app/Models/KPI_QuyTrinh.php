<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KPI_QuyTrinh extends Model
{
    protected $table = 'kpi_quytrinh';

    protected $fillable = ['quy_trinh_id','du_an_id','diem','thoigian'];

    public function du_an()
    {
        return $this->belongsTo(DuAn::class,'du_an_id');
    }
    public function quy_trinh()
    {
        return $this->belongsTo(QuyTrinh::class,'quy_trinh_id');
    }
}
