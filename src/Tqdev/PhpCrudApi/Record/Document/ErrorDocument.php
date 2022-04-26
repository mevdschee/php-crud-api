<?php

namespace Tqdev\PhpCrudApi\Record\Document;

use Tqdev\PhpCrudApi\Record\ErrorCode;

class ErrorDocument implements \JsonSerializable
{
    public $errorCode;
    public $argument;
    public $details;

    public function __construct(ErrorCode $errorCode, string $argument, $details)
    {
        $this->errorCode = $errorCode;
        $this->argument = $argument;
        $this->details = $details;
    }

    public function getStatus(): int
    {
        return $this->errorCode->getStatus();
    }

    public function getCode(): int
    {
        return $this->errorCode->getCode();
    }

    public function getMessage(): string
    {
        return $this->errorCode->getMessage($this->argument);
    }

    public function serialize()
    {
        return [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
            'details' => $this->details,
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter($this->serialize(), function ($v) {return $v !== null;});
    }

    public static function fromException(\Throwable $exception, bool $debug)
    {
        $document = new ErrorDocument(new ErrorCode(ErrorCode::ERROR_NOT_FOUND), $exception->getMessage(), null);
        if ($exception instanceof \PDOException) {
            if (strpos(strtolower($exception->getMessage()), 'duplicate') !== false) {
                $document = new ErrorDocument(new ErrorCode(ErrorCode::DUPLICATE_KEY_EXCEPTION), '', null);
            } elseif (strpos(strtolower($exception->getMessage()), 'unique constraint') !== false) {
                $document = new ErrorDocument(new ErrorCode(ErrorCode::DUPLICATE_KEY_EXCEPTION), '', null);
            } elseif (strpos(strtolower($exception->getMessage()), 'default value') !== false) {
                $document = new ErrorDocument(new ErrorCode(ErrorCode::DATA_INTEGRITY_VIOLATION), '', null);
            } elseif (strpos(strtolower($exception->getMessage()), 'allow nulls') !== false) {
                $document = new ErrorDocument(new ErrorCode(ErrorCode::DATA_INTEGRITY_VIOLATION), '', null);
            } elseif (strpos(strtolower($exception->getMessage()), 'constraint') !== false) {
                $document = new ErrorDocument(new ErrorCode(ErrorCode::DATA_INTEGRITY_VIOLATION), '', null);
            } else {
                $message = $debug ? $exception->getMessage() : 'PDOException occurred (enable debug mode)';
                $document = new ErrorDocument(new ErrorCode(ErrorCode::ERROR_NOT_FOUND), $message, null);
            }
        }
        return $document;
    }
}
