<?php

namespace KraftHaus\BauhausBlock;

use Illuminate\Support\Str;

class Builder
{

	public function render($type)
	{
		$class = \Str::studly($type . 'Block');
		return (new $class)
			->execute();
	}

}