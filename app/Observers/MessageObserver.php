<?php

namespace App\Observers;

use App\Models\Message;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     */
    public function created(Message $message): void
    {
        $receivers = $message->receivers()->get();

        foreach ($receivers as $receiver) {
            $message->status()->attach($receiver->id, [
                'sent_at' => now(),
            ]);

            $message->status()->attach($message->user_id, [
                'sent_at' => now(),
                'delivered_at' => now(),
                'read_at' => now(),
            ]);
        }
    }

    /**
     * Handle the Message "updated" event.
     */
    public function updated(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     */
    public function deleted(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     */
    public function restored(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     */
    public function forceDeleted(Message $message): void
    {
        //
    }
}
