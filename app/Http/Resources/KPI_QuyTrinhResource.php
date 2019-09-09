<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KPI_QuyTrinhResource extends JsonResource
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
            'ten_du_an' => $this->du_an->ten,
            'ten_quy_trinh' => $this->quy_trinh->ten,
            'diem' => $this->diem,
            'thoigian' => $this->thoigian
        ];
    }
}
