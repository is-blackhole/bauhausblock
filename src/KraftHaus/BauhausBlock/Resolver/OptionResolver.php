<?php

namespace KraftHaus\BauhausBlock\Resolver;

class OptionResolver
{

	protected $options = [];

	/**
	 * Set an option.
	 * 
	 * @param  string $key
	 * @param  mixed  $value
	 *
	 * @access public
	 * @return OptionResolver
	 */
	public function set($key, $value)
	{
		$this->options[$key] = $value;
		return $this;
	}

	/**
	 * Get an option.
	 * 
	 * @param  string $key
	 *
	 * @access public
	 * @return mixed
	 */
	public function get($key)
	{
		return $this->options[$key];
	}

	/**
	 * Check if an option is set.
	 *
	 * @access public
	 * @return boolean
	 */
	public function has()
	{
		return isset($this->options[$key]);
	}

}