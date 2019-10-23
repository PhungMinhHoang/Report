<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaiLieuQuyTrinhResource extends JsonResource
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
            'ten_tai_lieu' => $this->ten,
            'link' => $this->link,
            'danh_gia' => $this->danh_gia,
            'ten_du_an' => $this->kpi_quytrinh->du_an->ten,
            'ten_quy_trinh' => $this->kpi_quytrinh->quy_trinh->ten,
            'thoigian' => $this->kpi_quytrinh->thoigian,
            'ghi_chu' => $this->ghi_chu
        ];
    }
}
