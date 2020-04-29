<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;
use Tqdev\PhpCrudApi\ResponseFactory;

class XmlMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function convertFromJsonToXml(string $body): string
    {
        $objectElement = $this->getProperty('objectElement', 'object');
        $prolog = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml = new \SimpleXMLElement($prolog . '<root></root>');
        $object = json_decode($body);
        if (is_scalar($object)) {
            $xml = $xml->addChild($objectElement, $object);
        } else {
            $xml = $xml->addChild($objectElement);
            $this->convertFromObjectToXml($object, $xml, $objectElement);
        }
        return $prolog . $xml->asXML();
    }

    private function convertFromObjectToXml($object, $xml, string $objectElement): void
    {
        if (is_array($object)) {
            $xml->addAttribute('type', 'list');
        }
        foreach ($object as $key => $value) {
            if (!is_array($value) && !is_object($value)) {
                if (is_object($object)) {
                    $xml->addChild($key, (string) $value);
                } else {
                    $xml->addChild($objectElement, (string) $value);
                }
                continue;
            }
            $node = $xml;
            if (is_object($object)) {
                $node = $node->addChild($key);
            } elseif (is_object($value)) {
                $node = $node->addChild($objectElement);
            }
            $this->convertFromObjectToXml($value, $node, $objectElement);
        }
    }

    private function convertFromXmlToJson(string $body)/*: object */
    {
        $objectElement = $this->getProperty('objectElement', 'object');
        $prolog = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml = new \SimpleXMLElement($prolog . $body);
        $object = $this->convertFromXmlToObject($xml, $objectElement);
        return json_decode(json_encode($object));
    }

    private function convertFromXmlToObject($xml): array
    {
        $result = [];
        foreach ($xml->children() as $nodeName => $nodeValue) {
            if (count($nodeValue->children()) == 0) {
                $object = strVal($nodeValue);
            } else {
                $object = $this->convertFromXmlToObject($nodeValue);
            }
            $attributes = $xml->attributes();
            if ($attributes['type'] == 'list') {
                $result[] = $object;
            } else {
                $result[$nodeName] = $object;
            }
        }
        return $result;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);

        parse_str($request->getUri()->getQuery(), $params);
        $isXml = isset($params['format']) && $params['format'] == 'xml';
        if ($isXml) {
            $body = $request->getBody()->getContents();
            if ($body) {
                $json = $this->convertFromXmlToJson($body);
                $request = $request->withParsedBody($json);
            }
        }
        $response = $next->handle($request);
        if ($isXml) {
            $body = $response->getBody()->getContents();
            if ($body) {
                $xml = $this->convertFromJsonToXml($body);
                $response = ResponseFactory::fromXml(ResponseFactory::OK, $xml);
            }
        }
        return $response;
    }
}
