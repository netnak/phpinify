<?php

namespace Netnak\Phpinify\Tests\Feature;

use Illuminate\Http\Request;
use Netnak\Phpinify\Http\Middleware\PhpinifyMiddleware;
use Netnak\Phpinify\Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareTest extends TestCase
{
    public function test_middleware_minifies_html_response()
    {
        $middleware = new PhpinifyMiddleware();

        $request = Request::create('/');

        $response = new Response('<html >  <  body>   <h1> Test </h1>   </body>   </html>');
        $response->headers->set('Content-Type', 'text/html');

        $next = function ($req) use ($response) {
            return $response;
        };

        config(['phpinify.enable_response_minifier' => true]);

        $response = $middleware->handle($request, $next);

        $content = $response->getContent();

        $this->assertStringNotContainsString('  ', $content);
        $this->assertStringContainsString('<html><body><h1> Test </h1>', $content);
    }
}
