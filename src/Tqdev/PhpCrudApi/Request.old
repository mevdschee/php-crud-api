<?php
namespace Tqdev\PhpCrudApi;

class Request
{
    private $method;
    private $path;
    private $pathSegments;
    private $params;
    private $body;
    private $headers;
    private $highPerformance;

    public function __construct(String $method = null, String $path = null, String $query = null, array $headers = null, String $body = null, bool $highPerformance = true)
    {
        $this->parseMethod($method);
        $this->parsePath($path);
        $this->parseParams($query);
        $this->parseHeaders($headers);
        $this->parseBody($body);
        $this->highPerformance = $highPerformance;
    }

    private function parseMethod(String $method = null)
    {
        if (!$method) {
            if (isset($_SERVER['REQUEST_METHOD'])) {
                $method = $_SERVER['REQUEST_METHOD'];
            } else {
                $method = 'GET';
            }
        }
        $this->method = $method;
    }

    private function parsePath(String $path = null)
    {
        if (!$path) {
            if (isset($_SERVER['PATH_INFO'])) {
                $path = $_SERVER['PATH_INFO'];
            } else {
                $path = '/';
            }
        }
        $this->path = $path;
        $this->pathSegments = explode('/', $path);
    }

    private function parseParams(String $query = null)
    {
        if (!$query) {
            if (isset($_SERVER['QUERY_STRING'])) {
                $query = $_SERVER['QUERY_STRING'];
            } else {
                $query = '';
            }
        }
        $query = str_replace('][]=', ']=', str_replace('=', '[]=', $query));
        parse_str($query, $this->params);
    }

    private function parseHeaders(array $headers = null)
    {
        if (!$headers) {
            $headers = array();
            if (!$this->highPerformance) {
                foreach ($_SERVER as $name => $value) {
                    if (substr($name, 0, 5) == 'HTTP_') {
                        $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))));
                        $headers[$key] = $value;
                    }
                }
            }
        }
        $this->headers = $headers;
    }

    private function decodeBody(String $body) /*: ?object*/
    {
        $first = substr($body, 0, 1);
        if ($first == '[' || $first == '{') {
            $object = json_decode($body);
            $causeCode = json_last_error();
            if ($causeCode !== JSON_ERROR_NONE) {
                $object = null;
            }
        } else {
            parse_str($body, $input);
            foreach ($input as $key => $value) {
                if (substr($key, -9) == '__is_null') {
                    $input[substr($key, 0, -9)] = null;
                    unset($input[$key]);
                }
            }
            $object = (object) $input;
        }
        return $object;
    }

    private function parseBody(String $body = null) /*: void*/
    {
        if (!$body) {
            $body = file_get_contents('php://input');
        }
        $this->body = $this->decodeBody($body);
    }

    public function getMethod(): String
    {
        return $this->method;
    }

    public function getPath(): String
    {
        return $this->path;
    }

    public function getPathSegment(int $part): String
    {
        if ($part < 0 || $part >= count($this->pathSegments)) {
            return '';
        }
        return $this->pathSegments[$part];
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params) /*: void*/
    {
        $this->params = $params;
    }

    public function getBody() /*: ?array*/
    {
        return $this->body;
    }

    public function setBody($body) /*: void*/
    {
        $this->body = $body;
    }

    public function addHeader(String $key, String $value)
    {
        $this->headers[$key] = $value;
    }

    public function getHeader(String $key): String
    {
        if (isset($this->headers[$key])) {
            return $this->headers[$key];
        }
        if ($this->highPerformance) {
            $serverKey = 'HTTP_' . strtoupper(str_replace('-', '_', $key));
            if (isset($_SERVER[$serverKey])) {
                return $_SERVER[$serverKey];
            }
        }
        return '';
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public static function fromString(String $request): Request
    {
        $parts = explode("\n\n", trim($request), 2);
        $head = $parts[0];
        $body = isset($parts[1]) ? $parts[1] : null;
        $lines = explode("\n", $head);
        $line = explode(' ', trim(array_shift($lines)), 2);
        $method = $line[0];
        $url = isset($line[1]) ? $line[1] : '';
        $path = parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);
        $headers = array();
        foreach ($lines as $line) {
            list($key, $value) = explode(':', $line, 2);
            $headers[$key] = trim($value);
        }
        return new Request($method, $path, $query, $headers, $body);
    }
}
