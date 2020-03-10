<?php

namespace App\Http\Controllers;

use App\Http\Resources\Server as ServersResource;
use App\Http\Resources\ServerLog as ServerLogResource;
use App\Server;
use App\ServerLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ServersController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny' , Server::class);
        return ServersResource::collection(request()->user()->servers);
    }

    public function store()
    {
        $this->authorize('viewAny' , Server::class);

        $server = request()->user()->servers()->create($this->validateData());

        return (new ServersResource($server))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Server $server)
    {
        $this->authorize('view' , $server); //comes from ServerPolicy
        return new ServersResource($server);
    }

    public function update(Server $server)
    {
        $this->authorize('view' , $server);
        $server->update($this->validateData());
        return (new ServersResource($server))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Server $server)
    {
        $this->authorize('view' , $server);
        $server->delete();
        return response([], Response::HTTP_NO_CONTENT);
    }

    private function validateData(){
        return request()->validate([
            'status' => 'required',
            'domain' => 'required',
        ]);
    }

    public function serverLogs(Server $server)
    {
//        return json_encode($server->id);
        $logs = ServerLog::where('server_id', $server->id)->orderBy('created_at' , 'desc')->paginate(25);
        return  ServerLogResource::collection($logs);
    }


}
