<?php

namespace KraftHaus\BauhausBlock;

/**
 * This file is part of the KraftHaus BauhausBlock package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use KraftHaus\BauhausBlock\Resolver\OptionResolver;

/**
 * Class Builder
 * @package KraftHaus\BauhausBlock
 */
class Builder
{

	/**
	 * Render a block instance.
	 *
	 * @param  string $type
	 * @param  array  $options
	 *
	 * @access public
	 * @return mixed
	 */
	public function render($type, array $options = [])
	{
		$class = Str::studly($type . 'Block');
		$block = (new $class)
			->setOptionResolver(new OptionResolver($options));

		if ($block->getTtl() && Cache::has($class)) {
			return Cache::get($class);
		}

		return Cache::remember($class, $block->getTtl(), function() use ($block) {
			$block->configure($block->getOptionResolver());
			$block->execute();

			return $block->render()->render();
		});
	}

}