<?php

namespace App\Utils;

use App\Models\Notification;
use App\Email;
use App\Utils\Config;
use \Exception;

class Notifications
{
    public function Add($user_id, $subject, $body, $type, $email)
    {
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->subject = $subject;
        $notification->body = $body;
        $notification->type = $type;
        $notification->save();
        
        if(Config::get('EMAIL_NOTIFICATIONS'))
        {
            try{
                $client = "\\App\\Email\\" . Config::get('EMAIL_PROVIDER');

                (new $client(
                    'adamdchurch92@gmail.com',
                    $email,
                    $subject,
                    $body
                ))->send();
            } catch (Exception $e){
                // TO DO: Handle Exception.
            }
        }
    }
}
