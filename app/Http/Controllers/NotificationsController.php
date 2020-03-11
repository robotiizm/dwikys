<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function getBotKey()
    {
        $key = rand(10000,1000000);

        if (request()->user()->bot_key == null){
            request()->user()->update(['bot_key' => $key]);
            return  request()->user();
        }

        return  request()->user();

    }

    public function generateNewBotKey()
    {
        $key = rand(10,1000000);
        request()->user()->update(['bot_key' => $key]);
        return  request()->user();
    }

    public function checkKey()
    {
        $client = new Client();
        $token = env('TELEGRAM_BOT_TOKEN');
        $api_response = $client->get( 'https://api.telegram.org/bot' . $token . '/getUpdates')->getBody();
        $response = json_decode($api_response);
        $key = request()->user()->bot_key;
        foreach ($response->result as $res){
            if ($res->message->text == $key){
                request()->user()->update(['chat_id' => $res->message->chat->id]);
                $this->sendMessage("Welcome to DWIKYS. We will notify you once your servers get problem.");
                return request()->user();

            }
        }
        return ($response->result);
    }

    public function sendMessage($msg)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $client = new Client();
        $chatId = request()->user()->chat_id;
        $request_params = [
            'chat_id' => $chatId,
            'text' => $msg
        ];
        $api_response = $client->get( 'https://api.telegram.org/bot' . $token . '/sendMessage?'.http_build_query($request_params));

    }
}
