<?php

namespace KraftHaus\BauhausBlock\Facades;

/**
 * This file is part of the KraftHaus BauhausBlock package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\Facades\Facade;

/**
 * Class Block
 * @package KraftHaus\BauhausBlock\Facades
 */
class Block extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'KraftHaus\BauhausBlock\Builder';
	}

}