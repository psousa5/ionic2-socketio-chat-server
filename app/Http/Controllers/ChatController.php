<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Events\ChatMessage;
use App\Events\ChatWhisper;

class ChatController extends Controller
{
/*    public function sendMessage(Request $request){
        $message = $request->input('message');
        event(new ChatMessage($message));
        return response()->json(["message sent"]);
    }*/

    public function sendWhisper(Request $request){
        event(new ChatWhisper($request->input()));
        return response()->json(["whisper sent"]);
    }

}
