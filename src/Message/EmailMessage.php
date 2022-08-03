<?php

namespace App\Message;

class EmailMessage
{
    /** @var string */
    private $address;
    /** @var string */
    private $message;

    public function __construct(string $address, string $message)
    {
        $this->address = $address;
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
}
