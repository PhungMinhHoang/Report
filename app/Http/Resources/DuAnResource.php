<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DuAnResource extends JsonResource
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
            'ma_de_tai' => $this->ma_de_tai,
            'ten_de_tai' => $this->ten,
            'trang_thai' => (bool) $this->trang_thai,
            'ten_don_vi' => $this->don_vi->ten,
            'QA' => $this->user['name']
        ];
    }
}
