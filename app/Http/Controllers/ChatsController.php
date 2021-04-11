<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Chats;
use Illuminate\Support\Str;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','web']);
    }
    public function index()
    {
        return view('chats.index');
    }

    public function sendMessage()
    {
        $user = auth()->user();

        $message = $user->sendChats()->create([
            'messages' => 'Testing the mic please',
            'receiver_id' => (auth()->id() == 1)? 2: 1,
        ]);

        event(new Chats($user,$message));

        return response()->json('message sent',200);
    }

    public function fetchChat()
    {

    }
}
