<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerLog extends Model
{
    protected $guarded = [];
    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
