<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Chats as ChatsEvent;
use App\Models\Chats;
use App\Models\User;
use Illuminate\Support\Str;

class ChatsController extends Controller
{
    // protected $user,$chat;

    public function __construct(User $user, Chats $chat)
    {
        $this->middleware(['auth','web']);

        $this->user = $user;
        $this->chat = $chat;
    }

    public function index()
    {
        return view('chats.index');
    }

    public function chatsBox(User $receiver)
    {
        return view('chats.chatBox',[
            'receiver' => $receiver
        ]);
    }

    public function contactList()
    {
        $contactList = $this->user->where('id', '!=', auth()->id())->get();
        return view('chats.contact-list',[
            'contacts' => $contactList,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request,[
            'messages' => 'required|string',
            'receiver_id' => 'required|string'
        ]);

        $receiver = $this->user->findOrFail($request->receiver_id);
        $user = auth()->user();

        $message = $user->sendChats()->create([
            'messages' => e($request->messages),
            'receiver_id' => $receiver->id,
        ]);

        event(new ChatsEvent($user,$message,$receiver));

        return response()->json('message sent',200);
    }

    public function fetchMessage(User $receiver)
    {
        $messages = $this->chat->where('sender_id',auth()->id())
            ->where('receiver_id',$receiver->id)
                ->orWhere(function($query) use ($receiver){
                    $query->where('sender_id',$receiver->id)->where('receiver_id',auth()->id());
                })->get(['created_at', 'sender_id', 'receiver_id', 'messages', 'status']);
            return response()->json($messages,200);
    }
}
