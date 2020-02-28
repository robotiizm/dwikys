<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ServerLog extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return[
                'type' => $this->type,
                'ping' => $this->ping,
                'details' => $this->details,
                'time' => $this->updated_at->format('Y-m-d  |  H:i'),
        ];
    }
}
