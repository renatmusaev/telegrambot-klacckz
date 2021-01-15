<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public function index() {

        $telegram = Telegram::getWebHookUpdates();
        if (!$telegram->isEmpty()) {
            $chat_id = $telegram['message']['chat']['id'];
    
            Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => 'Hello!'
            ]);
        } else {
            die("Empty");
        }

        // $response = Telegram::getMe();
        // $botId = $response->getId();
        // $firstName = $response->getFirstName();
        // $username = $response->getUsername();
        // dd($response);

        // $data = json_decode(file_get_contents('php://input'), true);
        // file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);

        // dd($data);

        return "Hello!";
    }
}
