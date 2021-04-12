<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Chats implements ShouldBroadcast
{
    protected $chat;
    protected $user;
    protected $receiver;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$chat,$receiver)
    {
        $this->user = $user;
        $this->chat = $chat;
        $this->receiver = $receiver;
    }

    public function broadcastWith()
    {
        return [
            'chats' => $this->chat->with(['sender'=> function($query){
                $query->select(['id','name']);
            }, 'receiver' => function ($query) {
                $query->select(['id', 'name']);
            },])->first(),
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chats.'.$this->receiver->id);
    }
}
