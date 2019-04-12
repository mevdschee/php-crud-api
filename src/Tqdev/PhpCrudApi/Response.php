<?php
namespace Tqdev\PhpCrudApi;

class Response
{
    const OK = 200;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const CONFLICT = 409;
    const UNPROCESSABLE_ENTITY = 422;
    const INTERNAL_SERVER_ERROR = 500;
    private $status;
    private $headers;
    private $body;

    public function __construct(int $status, $body)
    {
        $this->status = $status;
        $this->headers = array();
        $this->parseBody($body);
    }

    private function parseBody($body)
    {
        if ($body === '') {
            $this->body = '';
        } else {
            $data = json_encode($body, JSON_UNESCAPED_UNICODE);
            $this->addHeader('Content-Type', 'application/json');
            $this->addHeader('Content-Length', strlen($data));
            $this->body = $data;
        }
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getBody(): String
    {
        return $this->body;
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
        return null;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function output()
    {
        http_response_code($this->getStatus());
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
        echo $this->getBody();
    }

    public function addExceptionHeaders(\Throwable $e)
    {
        $this->addHeader('X-Exception-Name', get_class($e));
        $this->addHeader('X-Exception-Message', $e->getMessage());
        $this->addHeader('X-Exception-File', $e->getFile() . ':' . $e->getLine());
    }

    public function __toString(): String
    {
        $str = "$this->status\n";
        foreach ($this->headers as $key => $value) {
            $str .= "$key: $value\n";
        }
        if ($this->body !== '') {
            $str .= "\n";
            $str .= "$this->body\n";
        }
        return $str;
    }
}
