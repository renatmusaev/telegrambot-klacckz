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
            $text = $telegram['message']['text'];
    
            // Telegram::sendMessage([
            //     'chat_id' => $chat_id,
            //     'text' => $text." copy",
            // ]);

            $keyboard = [
                ['7', '8', '9'],
                ['4', '5', '6'],
                ['1', '2', '3'],
                     ['0']
            ];
            
            $reply_markup = Telegram::replyKeyboardMarkup([
                'keyboard' => $keyboard, 
                'resize_keyboard' => true, 
                'one_time_keyboard' => true
            ]);
            
            $response = Telegram::sendMessage([
                'chat_id' => $chat_id, 
                'text' => 'Hello World', 
                'reply_markup' => $reply_markup
            ]);
            
            $messageId = $response->getMessageId();
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
