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
            'ma-du-an' => $this->ma_de_tai,
            'ten-du-an' => $this->ten,
            'ten-don-vi' => $this->don_vi->ten
        ];
    }
}
