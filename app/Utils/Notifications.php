<?php

namespace App\Utils;

use App\Models\Notification;

class Notifications
{
    public function Add($user_id, $subject, $body, $type)
    {
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->subject = $subject;
        $notification->body = $body;
        $notification->type = $type;
        $notification->save();
    }
}
