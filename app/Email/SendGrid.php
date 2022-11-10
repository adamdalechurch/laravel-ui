<?php

namespace App\Email;

use SendGrid as SendGridClient;
use SendGrid\Mail\Mail as SendGridEmail;
use \Exception;

class SendGrid extends Email 
{
    function send()
    {        
        try {
            $email = new SendGridEmail(); 
            $email->setFrom("adamdchurch92@gmail.com", "adamdchurch92@gmail.com");
            $email->setSubject($this->subject);
            $email->addTo($this->to, $this->to);
            $email->addContent("text/plain", $this->body);

            $sendgrid = new SendGridClient(env('SENDGRID_API_KEY'));

            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: '.  $e->getMessage(). "\n";
        }
    }
}

?>