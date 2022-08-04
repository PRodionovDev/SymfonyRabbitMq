<?php

namespace App\Message;

class EmailMessage
{
    /** @var string */
    private $address;
    /** @var string */
    private $subject;
    /** @var string */
    private $message;

    public const EMAIL_SUBJECT = 'subject';
    public const EMAIL_MESSAGE = 'message';

    public function __construct(string $address, string $subject, string $message)
    {
        $this->address = $address;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }
}
