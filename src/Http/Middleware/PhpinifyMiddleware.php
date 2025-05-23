<?php

namespace Netnak\Phpinify\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Netnak\Phpinify\Phpinify;

class PhpinifyMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		$response = $next($request);

		// if (config('phpinify.DoMinify')) {
			
			if (method_exists($response, 'content')) {
				// if there is no content don't replace it
				if (!$content = $response->content()) {
					return;
				}
				// quick and dirty check for html, just in case a controler happens to be pushing html, check the uri
				if (stripos($content, '<html') !== false && !request()->is('!/*')) {
					$minifiedContent = (new Phpinify($content))->getPhpinified();
					$response->setContent($minifiedContent);
				}
			}
		// }
		return $response;
	}
}
