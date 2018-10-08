<?php
namespace Tqdev\PhpCrudApi\Controller;

use Tqdev\PhpCrudApi\Record\Document\ErrorDocument;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Response;

class Responder
{
    public function error(int $error, String $argument, $details = null): Response
    {
        $errorCode = new ErrorCode($error);
        $status = $errorCode->getStatus();
        $document = new ErrorDocument($errorCode, $argument, $details);
        return new Response($status, $document);
    }

    public function success($result): Response
    {
        return new Response(Response::OK, $result);
    }

    public function redirect(String $url): Response
    {
        $response = new Response(Response::FOUND, '');
        $response->addHeader('Location', $url);
        return $response;
    }

    public function html(String $url): Response
    {
        $response = new Response(Response::FOUND, '');
        $response->addHeader('Location', $url);
        return $response;
    }

}
