<?php

namespace Netnak\Phpinify;

use voku\helper\HtmlMin;

class Phpinify
{
	/**
	 * @var mixed
	 */
	protected $html;

	/**
	 * Phpinify constructor.
	 *
	 * @param mixed $content
	 */
	public function __construct($html)
	{
		$this->html = $html;
	}

	public function getPhpinified()
	{
		$htmlMin = new HtmlMin();
		$configArr = config('phpinify');
		// set object function params from config array
		foreach ($configArr as $k => $v)
			$htmlMin->$k($v);
		$minifiedHtml = $htmlMin->minify($this->html);

        
		return $minifiedHtml;
	}
}
