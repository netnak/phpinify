<?php

namespace Netnak\Phpinify\Replacers;

use Illuminate\Http\Response;
use Statamic\StaticCaching\Replacer;
use Netnak\Phpinify\Phpinify;

class PhpinifyReplacer implements Replacer
{
	// minify the html before writing to static cache
	public function prepareResponseToCache(Response $response, Response $initial)
	{
		// if (config('phpinify.DoMinify')) {
			// dd('here');

			$content = $response->getContent();

			if (!$content || !stripos($content, '<html') !== false) {
				return;
			}

			$minifiedContent = (new Phpinify($content))->getPhpinified();

			// replace the app url with the web url
			$replacedContent = preg_replace(
				'/\b' . preg_quote(config('app.url'), '/') . '\b/',
				config('app.web_url'),
				$minifiedContent
			);

			// also do the escaped version for where it appears in json
			$escapedAppUrl = substr(json_encode(config('app.url')), 1, -1);
			$escapedWebUrl = substr(json_encode(config('app.web_url')), 1, -1);

			$replacedContent = preg_replace(
				'/\b' . preg_quote($escapedAppUrl, '/') . '\b/',
				$escapedWebUrl,
				$replacedContent
			);

			$response->setContent($replacedContent);
		// }
	}

	// should never get here with full measure set up correctly!
	public function replaceInCachedResponse(Response $response)
	{
		return;
	}
}
