<?php

namespace KraftHaus\BauhausBlock;

use Illuminate\Support\Str;
use KraftHaus\BauhausBlock\Resolver\OptionResolver;

class Builder
{

	protected $optionResolver;

	public function render($type)
	{
		$this->setOptionResolver(new OptionResolver);

		$class = \Str::studly($type . 'Block');
		$block = new $class;
		$block->setDefaults($this->getOptionResolver());

		return $block->execute();
	}

	/**
	 * Set the OptionResolver object.
	 *
	 * @param  OptionResolver $optionResolver
	 *
	 * @access public
	 * @return Builder
	 */
	public function setOptionResolver($optionResolver)
	{
		$this->optionResolver = $optionResolver;
		return $this;
	}

	/**
	 * Get the OptionResolver object.
	 * 
	 * @access public
	 * @return OptionResolver
	 */
	public function getOptionResolver()
	{
		return $this->optionResolver;
	}

}