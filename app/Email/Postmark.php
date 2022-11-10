<?php

namespace App\Email;

use Postmark\PostmarkClient;

class Postmark extends Email 
{
    function send()
    {
        return ( new PostmarkClient(env('POSTMARK_TOKEN')))->sendEmail(
            $this->from,
            $this->to,
            $this->subject,
            $this->body
        );
    }
}

?>