<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Server extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'data'=>[
                'server_id' => $this->id,
                'ip' => $this->ip,
                'domain' => $this->domain,
                'status' => $this->status,
                'status' => $this->status,
                'last_updated' => $this->updated_at->diffForHumans(),
                'expire_date' => Carbon::parse($this->expire_date)->format('d/m/Y'),
            ],
            'links'=>[
                'self' => url('/servers/'.$this->id),
            ]

        ];
    }
}
