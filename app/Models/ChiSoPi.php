<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiSoPi extends Model
{
    protected $table = 'chi_so_pi';

    protected $fillable = ['tuy_chon_id', 'TCT', 'K1', 'K2', 'K3', 'thoigian'];
}
