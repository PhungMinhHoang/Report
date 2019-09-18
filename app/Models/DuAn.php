<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuAn extends Model
{
    protected $table = 'du_an';

    protected $fillable = ['ma_de_tai','ten','donvi_id','user_id'];

    public function don_vi()
    {
        return $this->belongsTo(DonVi::class,'donvi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
