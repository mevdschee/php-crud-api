<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\ResponseFactory;

class XmlMiddleware extends Middleware
{
    public function __construct(Router $router, Responder $responder, Config $config, string $middleware)
    {
        parent::__construct($router, $responder, $config, $middleware);
    }

    private function json2xml($json, $types = 'null,boolean,number,string,object,array')
    {
        $a = json_decode($json);
        $d = new \DOMDocument();
        $c = $d->createElement("root");
        $d->appendChild($c);
        $t = function ($v) {
            $type = gettype($v);
            switch ($type) {
                case 'integer':
                    return 'number';
                case 'double':
                    return 'number';
                default:
                    return strtolower($type);
            }
        };
        $ts = explode(',', $types);
        $f = function ($f, $c, $a, $s = false) use ($t, $d, $ts) {
            if (in_array($t($a), $ts)) {
                $c->setAttribute('type', $t($a));
            }
            if ($t($a) != 'array' && $t($a) != 'object') {
                if ($t($a) == 'boolean') {
                    $c->appendChild($d->createTextNode($a ? 'true' : 'false'));
                } else {
                    $c->appendChild($d->createTextNode($a));
                }
            } else {
                foreach ($a as $k => $v) {
                    $k = preg_replace('/[^a-z0-9\-\_\.]/', '', $k);
                    if ($k == '__type' && $t($a) == 'object') {
                        $c->setAttribute('__type', $v);
                    } else {
                        if ($t($v) == 'object') {
                            $ch = $c->appendChild($d->createElementNS(null, $s ? 'item' : $k));
                            $f($f, $ch, $v);
                        } else if ($t($v) == 'array') {
                            $ch = $c->appendChild($d->createElementNS(null, $s ? 'item' : $k));
                            $f($f, $ch, $v, true);
                        } else {
                            $va = $d->createElementNS(null, $s ? 'item' : $k);
                            if ($t($v) == 'boolean') {
                                $va->appendChild($d->createTextNode($v ? 'true' : 'false'));
                            } else {
                                $va->appendChild($d->createTextNode((string) $v));
                            }
                            $ch = $c->appendChild($va);
                            if (in_array($t($v), $ts)) {
                                $ch->setAttribute('type', $t($v));
                            }
                        }
                    }
                }
            }
        };
        $f($f, $c, $a, $t($a) == 'array');
        return $d->saveXML($d->documentElement);
    }

    private function xml2json($xml): string
    {
        $o = @simplexml_load_string($xml);
        if ($o === false) {
            return '';
        }
        $a = @dom_import_simplexml($o);
        if (!$a) {
            return '';
        }
        $t = function ($v) {
            $t = $v->getAttribute('type');
            $txt = $v->firstChild->nodeType == XML_TEXT_NODE;
            return $t ?: ($txt ? 'string' : 'object');
        };
        $f = function ($f, $a) use ($t) {
            $c = null;
            if ($t($a) == 'null') {
                $c = null;
            } else if ($t($a) == 'boolean') {
                $b = substr(strtolower($a->textContent), 0, 1);
                $c = in_array($b, array('1', 't'));
            } else if ($t($a) == 'number') {
                $c = $a->textContent + 0;
            } else if ($t($a) == 'string') {
                $c = $a->textContent;
            } else if ($t($a) == 'object') {
                $c = array();
                if ($a->getAttribute('__type')) {
                    $c['__type'] = $a->getAttribute('__type');
                }
                for ($i = 0; $i < $a->childNodes->length; $i++) {
                    $v = $a->childNodes[$i];
                    $c[$v->nodeName] = $f($f, $v);
                }
                $c = (object) $c;
            } else if ($t($a) == 'array') {
                $c = array();
                for ($i = 0; $i < $a->childNodes->length; $i++) {
                    $v = $a->childNodes[$i];
                    $c[$i] = $f($f, $v);
                }
            }
            return $c;
        };
        $c = $f($f, $a);
        return (string) json_encode($c);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        parse_str($request->getUri()->getQuery(), $params);
        $isXml = isset($params['format']) && $params['format'] == 'xml';
        if ($isXml) {
            $body = $request->getBody()->getContents();
            if ($body) {
                $json = $this->xml2json($body);
                $request = $request->withParsedBody(json_decode($json));
            }
        }
        $response = $next->handle($request);
        if ($isXml) {
            $body = $response->getBody()->getContents();
            if ($body) {
                $types = implode(',', $this->getArrayProperty('types', 'null,array'));
                if ($types == '' || $types == 'all') {
                    $xml = $this->json2xml($body);
                } else {
                    $xml = $this->json2xml($body, $types);
                }
                $response = ResponseFactory::fromXml(ResponseFactory::OK, $xml);
            }
        }
        return $response;
    }
}
