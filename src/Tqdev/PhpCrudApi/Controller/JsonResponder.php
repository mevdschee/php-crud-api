<?php
namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ResponseInterface;
use Tqdev\PhpCrudApi\Record\Document\ErrorDocument;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\ResponseFactory;

class JsonResponder implements Responder
{
    public function error(int $error, string $argument, $details = null): ResponseInterface
    {
        $errorCode = new ErrorCode($error);
        $status = $errorCode->getStatus();
        $document = new ErrorDocument($errorCode, $argument, $details);
        return ResponseFactory::fromObject($status, $document);
    }

    public function success($result): ResponseInterface
    {
        return ResponseFactory::fromObject(ResponseFactory::OK, $result);
    }

}
