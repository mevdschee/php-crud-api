<?php

namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ResponseInterface;
use Tqdev\PhpCrudApi\Record\Document\ErrorDocument;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\ResponseFactory;

class JsonResponder implements Responder
{
    private $debug;

    public function __construct(bool $debug)
    {
        $this->debug = $debug;
    }

    public function error(int $error, string $argument, $details = null): ResponseInterface
    {
        $document = new ErrorDocument(new ErrorCode($error), $argument, $details);
        return ResponseFactory::fromObject($document->getStatus(), $document);
    }

    public function success($result): ResponseInterface
    {
        return ResponseFactory::fromObject(ResponseFactory::OK, $result);
    }

    public function exception($exception): ResponseInterface
    {
        $document = ErrorDocument::fromException($exception);
        $response = ResponseFactory::fromObject($document->getStatus(), $document);
        if ($this->debug) {
            $response = ResponseUtils::addExceptionHeaders($response, $exception);
        }
        return $response;
    }

    public function multi($results): ResponseInterface
    {
        $document = array();
        $success = true;
        foreach ($results as $i=>$result) {
            if ($result instanceof \Throwable) {
                $document[$i] = ErrorDocument::fromException($result);
                $success = false;
            } else {
                $document[$i] = $result;
            }
        }
        $status = $success ? ResponseFactory::OK : ResponseFactory::FAILED_DEPENDENCY;
        $response = ResponseFactory::fromObject($status, $document);
        foreach ($results as $i=>$result) {
            if ($result instanceof \Throwable) {
                if ($this->debug) {
                    $response = ResponseUtils::addExceptionHeaders($response, $result);
                }
            }
        }
        return $response;
    }

}
