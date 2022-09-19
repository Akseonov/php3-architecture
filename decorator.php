<?php

interface ISend {
    public function send($message);
}

class Message implements ISend {
    public function send($message) {

    }
}

class ChromeNotificationMessage implements ISend {
    public function __construct(
        protected ISend $message,
    )
    {
    }

    public function send($message) {

    }
}

class EmailMessage implements ISend {
    public function __construct(
        protected ISend $message,
    )
    {
    }

    public function send($message)
    {

    }
}

class SmsMessage implements ISend {
    public function __construct(
        protected ISend $message,
    )
    {
    }

    public function send($message)
    {

    }
}

$message = new ChromeNotificationMessage(new EmailMessage(new SmsMessage(new Message())));

$message->send('сообщение');

