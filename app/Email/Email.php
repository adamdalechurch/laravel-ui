<?php

namespace App\Email;

use App\Models\DbEmail;

abstract class Email 
{
    protected $from;
    protected $to;
    protected $subject;
    protected $body;

    public abstract function send();

    public function __construct($from, $to, $subject, $body)
	{
        $this->from    = $from;
        $this->to      = $to;
        $this->subject = $subject;
        $this->body    = $body;

        $db_email = new DbEmail;
        $db_email->from    = 'notifications@projeny.com';
        $db_email->to      = $to;
        $db_email->subject = $subject;
        $db_email->body    = $body;
        $db_email->save();
    }
}

?>