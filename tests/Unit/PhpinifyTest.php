<?php

namespace Netnak\Phpinify\Tests\Unit;

use Netnak\Phpinify\Phpinify;
use Netnak\Phpinify\Tests\TestCase;

class PhpinifyTest extends TestCase
{
    public function test_minifies_html()
    {
        $html = '<html>  <body>   <h1> Hello World </h1>   </body></html>';
        $phpinify = new Phpinify($html);
        $minified = $phpinify->getPhpinified();

        $this->assertStringNotContainsString('  ', $minified);
        $this->assertStringContainsString('<h1>Hello World</h1>', $minified);
    }
}
