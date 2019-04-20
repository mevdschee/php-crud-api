<?php
namespace Tqdev\PhpCrudApi\Record\Document;

use Tqdev\PhpCrudApi\Record\ErrorCode;

class ErrorDocument implements \JsonSerializable
{
    public $code;
    public $message;
    public $details;

    public function __construct(ErrorCode $errorCode, string $argument, $details)
    {
        $this->code = $errorCode->getCode();
        $this->message = $errorCode->getMessage($argument);
        $this->details = $details;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function serialize()
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'details' => $this->details,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize());
    }
}
