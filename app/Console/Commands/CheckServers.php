<?php

namespace App\Console\Commands;

use App\Server;
use App\ServerLog;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use JJG\Ping;

class CheckServers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CheckServers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
//        \Log::error('This definitely should have run!');
        $servers = Server::where('status' , 'active')->get();
        foreach ($servers as $server) {
            $host = $server->domain;
            $ping = new Ping($host);
//            echo $server->domain;


            $latency = $ping->ping();
            if ($latency !== false) {
                echo  $host. '-> ' . $latency ."\r\n";

                if ($latency >= 500){
//                    echo $host.' is Slow'."\r\n";
                    $userId = $server->user_id;
                    $chatId = User::where('id' , $userId)->pluck('chat_id')->first();

                    $server->serverLog()->create([
                        'type' => 'Slow',
                        'ping' => $latency,
                        'score' => '',
                        'details'=>''
                    ]);

                    $this->sendMessage($host.' is Slow'."\r\n ping-> ".$latency , $chatId);
                }
            } else {
                $userId = $server->user_id;
                $chatId = User::where('id' , $userId)->pluck('chat_id')->first();
                print $host.' could not be reached.'."\r\n";
                $server->serverLog()->create([
                    'type' => 'Down',
                    'ping' => 'timeout',
                    'score' => '',
                    'details'=>''
                ]);
                $this->sendMessage($host.' could not be reached.'."\r\n" , $chatId);
            }



        }

    }

    public function checkGoogleScore($host)
    {
        $client = new Client();
        $api_response = $client->get( 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=https://'.$host.'&strategy=desktop');
        $response = json_decode($api_response->getBody() , true);
        $score = $response['lighthouseResult']['categories']['performance']['score'] * 100;
        $loadingTime =  $response['lighthouseResult']['audits']['speed-index']['displayValue'];
        return $loadingTime;
    }

    public function sendMessage($msg , $chatId)
    {
        $token = '1012327452:AAGXzy4w8nxcQ_DTJ6fySjMIM7X13Rgm50U';
        $client = new Client();
        $request_params = [
            'chat_id' => $chatId,
            'text' => $msg
        ];
        $api_response = $client->get( 'https://api.telegram.org/bot' . $token . '/sendMessage?'.http_build_query($request_params));

    }





}
