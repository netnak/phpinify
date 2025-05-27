# Phpinify

> Phpinify is a Statamic addon that minifies the response and/or static pages.

## Features

This addon uses voku/html-min for minification and exposes its setting in the config:

 - doOptimizeViaHtmlDomParser();               // optimize html via "HtmlDomParser()"
 - doRemoveComments();                         // remove default HTML comments (depends on "doOptimizeViaHtmlDomParser(true)")
 - doSumUpWhitespace();                        // sum-up extra whitespace from the Dom (depends on "doOptimizeViaHtmlDomParser(true)")
 - doRemoveWhitespaceAroundTags();             // remove whitespace around tags (depends on "doOptimizeViaHtmlDomParser(true)")
 - doOptimizeAttributes();                     // optimize html attributes (depends on "doOptimizeViaHtmlDomParser(true)")
 - doRemoveHttpPrefixFromAttributes();         // remove optional "http:"-prefix from attributes (depends on "doOptimizeAttributes(true)")
 - doRemoveHttpsPrefixFromAttributes();        // remove optional "https:"-prefix from attributes (depends on "doOptimizeAttributes(true)")
 - doKeepHttpAndHttpsPrefixOnExternalAttributes(); // keep "http:"- and "https:"-prefix for all external links 
 - doMakeSameDomainsLinksRelative([ - example.com - ]); // make some links relative, by removing the domain from attributes
 - doRemoveDefaultAttributes();                // remove defaults (depends on "doOptimizeAttributes(true)" | disabled by default)
 - doRemoveDeprecatedAnchorName();             // remove deprecated anchor-jump (depends on "doOptimizeAttributes(true)")
 - doRemoveDeprecatedScriptCharsetAttribute(); // remove deprecated charset-attribute - the browser will use the charset from the HTTP-Header, anyway (depends on "doOptimizeAttributes(true)")
 - doRemoveDeprecatedTypeFromScriptTag();      // remove deprecated script-mime-types (depends on "doOptimizeAttributes(true)")
 - doRemoveDeprecatedTypeFromStylesheetLink(); // remove "type=text/css" for css links (depends on "doOptimizeAttributes(true)")
 - doRemoveDeprecatedTypeFromStyleAndLinkTag(); // remove "type=text/css" from all links and styles
 - doRemoveDefaultMediaTypeFromStyleAndLinkTag(); // remove "media="all" from all links and styles
 - doRemoveDefaultTypeFromButton();            // remove type="submit" from button tags 
 - doRemoveEmptyAttributes();                  // remove some empty attributes (depends on "doOptimizeAttributes(true)")
 - doRemoveValueFromEmptyInput();              // remove  - value="" -  from empty <input> (depends on "doOptimizeAttributes(true)")
 - doSortCssClassNames();                      // sort css-class-names, for better gzip results (depends on "doOptimizeAttributes(true)")
 - doSortHtmlAttributes();                     // sort html-attributes, for better gzip results (depends on "doOptimizeAttributes(true)")
 - doRemoveSpacesBetweenTags();                // remove more (aggressive) spaces in the dom (disabled by default)
 - doRemoveOmittedQuotes();                    // remove quotes e.g. class="lall" => class=lall
 - doRemoveOmittedHtmlTags();                  // remove ommitted html tags e.g. <p>lall</p> => <p>lall 

## How to Install

run

``` bash
composer require netnak/phpinify
```

optionally publish config

``` bash
php artisan vendor:publish --tag=phpinify-config  --force
```

Should set up replacer on boot, but you can permanently add the replacer in config/statamic/static_caching.php

``` bash
 - replacers -  => [
   ...
    
    \Netnak\Phpinify\Replacers\PhpinifyReplacer::class,
],
```
## How to Use

To enable response minifcation or static minification add the following varibales to your .env:

PHPINIFY_RESPONSE = true
PHPINIFY_STATIC = true

The addon config file uses these to enable functionality

enable_response_minifier => env(PHPINIFY_RESPONSE, false)
enable_static_cache_replacer => env(PHPINIFY_STATIC, false)

You can set ignored paths to avoud minification at the top of the config:

ignored_paths => [!/*, api/*]
