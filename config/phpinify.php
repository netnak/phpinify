<?php

return [
	// 'doMinify' => true,									// Operator: Main screen turn on. Captain: It's you !! 
	'doOptimizeViaHtmlDomParser' => true,            	// optimize html via "HtmlDomParser()"
	'doRemoveComments' => true,                    		// remove default HTML comments (depends on "doOptimizeViaHtmlDomParser(true)")
	'doSumUpWhitespace' => true,                     	// sum-up extra whitespace from the Dom (depends on "doOptimizeViaHtmlDomParser(true)")
	'doRemoveWhitespaceAroundTags' => false,            // remove whitespace around tags (depends on "doOptimizeViaHtmlDomParser(true)")
	'doOptimizeAttributes' => false,                    // optimize html attributes (depends on "doOptimizeViaHtmlDomParser(true)")
	'doRemoveHttpPrefixFromAttributes' => false,        // remove optional "http:"-prefix from attributes (depends on "doOptimizeAttributes(true)")
	'doRemoveHttpsPrefixFromAttributes' => false,       // remove optional "https:"-prefix from attributes (depends on "doOptimizeAttributes(true)")
	'doKeepHttpAndHttpsPrefixOnExternalAttributes' => false, // keep "http:"- and "https:"-prefix for all external links 
	'doMakeSameDomainsLinksRelative' => [], 			// make some links relative, by removing the domain from attributes
	'doRemoveDefaultAttributes' => false,                // remove defaults (depends on "doOptimizeAttributes(true)" | disabled by default)
	'doRemoveDeprecatedAnchorName' => false,             // remove deprecated anchor-jump (depends on "doOptimizeAttributes(true)")
	'doRemoveDeprecatedScriptCharsetAttribute' => false, // remove deprecated charset-attribute - the browser will use the charset from the HTTP-Header, anyway (depends on "doOptimizeAttributes(true)")
	'doRemoveDeprecatedTypeFromScriptTag' => false,      // remove deprecated script-mime-types (depends on "doOptimizeAttributes(true)")
	'doRemoveDeprecatedTypeFromStylesheetLink' => false, // remove "type=text/css" for css links (depends on "doOptimizeAttributes(true)")
	'doRemoveDeprecatedTypeFromStyleAndLinkTag' => false, // remove "type=text/css" from all links and styles
	'doRemoveDefaultMediaTypeFromStyleAndLinkTag' => false, // remove "media="all" from all links and styles
	'doRemoveDefaultTypeFromButton' => false,            // remove type="submit" from button tags 
	'doRemoveEmptyAttributes' => false,                  // remove some empty attributes (depends on "doOptimizeAttributes(true)")
	'doRemoveValueFromEmptyInput' => false,              // remove 'value=""' from empty <input> (depends on "doOptimizeAttributes(true)")
	'doSortCssClassNames' => false,                      // sort css-class-names, for better gzip results (depends on "doOptimizeAttributes(true)")
	'doSortHtmlAttributes' => false,                     // sort html-attributes, for better gzip results (depends on "doOptimizeAttributes(true)")
	'doRemoveSpacesBetweenTags' => false,                // remove more (aggressive) spaces in the dom (disabled by default)
	'doRemoveOmittedQuotes' => false,                    // remove quotes e.g. class="lall" => class=lall
	'doRemoveOmittedHtmlTags' => false,                  // remove ommitted html tags e.g. <p>lall</p> => <p>lall
];