<?php

namespace KraftHaus\BauhausBlock\Facades;

use Illuminate\Support\Facades\Facade;

class Block extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'KraftHaus\BauhausBlock\Builder';
	}

}