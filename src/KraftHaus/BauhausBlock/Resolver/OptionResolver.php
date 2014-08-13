<?php

namespace KraftHaus\BauhausBlock\Resolver;

/**
 * This file is part of the KraftHaus BauhausBlock package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Class OptionResolver
 * @package KraftHaus\BauhausBlock\Resolver
 */
class OptionResolver
{

	protected $options = [];

	/**
	 * Magic option setter.
	 *
	 * @param  string $key
	 * @param  string $value
	 *
	 * @access public
	 * @return OptionResolver
	 */
	public function __set($key, $value)
	{
		return $this->set($key, $value);
	}

	/**
	 * Magic option getter.
	 *
	 * @param  string $key
	 *
	 * @access public
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->get($key);
	}

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
	 * @param  string $key
	 *
	 * @access public
	 * @return boolean
	 */
	public function has($key)
	{
		return isset($this->options[$key]);
	}

}