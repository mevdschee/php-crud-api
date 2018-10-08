<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class Auth0Middleware extends Middleware
{

    private function getFullUrl(String $path)
    {
        list($scheme, $default) = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? array('https', 443) : array('http', 80);
        $port = ($_SERVER['SERVER_PORT'] == $default) ? '' : (':' . $_SERVER['SERVER_PORT']);
        return $scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . $path;
    }

    private function login(Request $request): Response
    {
        $domain = $this->getProperty('domain', '');
        $clientId = $this->getProperty('clientId', '');
        $redirectUri = $this->getFullUrl('/callback');
        $url = "https://$domain/authorize?response_type=token&client_id=$clientId&redirect_uri=$redirectUri";
        return $this->responder->redirect($url);
    }

    private function callback(Request $request): Response
    {
        $response = $this->responder->success('<h1>test</h1>');
        $response->addHeader('Content-Type', 'text/html');
        return $response;
    }

    private function logout(Request $request): Response
    {
        session_destroy();
        $url = $this->getFullUrl('/login');
        return $this->responder->redirect($url);
    }

    public function handle(Request $request): Response
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $path = $request->getPathSegment(1);
        switch ($path) {
            case 'login':
                return $this->login($request);
            case 'callback':
                return $this->callback($request);
            case 'logout':
                return $this->logout($request);
        }
        return $this->next->handle($request);
    }
}
