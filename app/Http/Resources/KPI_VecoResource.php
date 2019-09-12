<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KPI_VecoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            //'tuy_chon' => $this->tuy_chon->mo_ta,
            'chi_so' => $this->chi_so,
            'ten_don_vi' => $this->don_vi->ten,
            'id_don_vi' => $this->don_vi->id,
            'thoi_gian' => $this->thoi_gian
        ];
    }
}
