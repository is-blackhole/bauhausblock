<?php

namespace KraftHaus\BauhausBlock;

/**
 * This file is part of the KraftHaus Bauhaus package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use KraftHaus\BauhausBlock\Resolver\OptionResolver;

/**
 * Class Block
 * @package KraftHaus\BauhausBlock
 * @abstract
 */
abstract class Block
{

	/**
	 * Holds the OptionResolver object.
	 * @var OptionResolver
	 */
	protected $optionResolver;

	/**
	 * Holds the cache timeout.
	 * @var int
	 */
	protected $ttl = false;

	/**
	 * Configure the current block instance.
	 *
	 * @param  OptionResolver $resolver
	 *
	 * @access public
	 * @return mixed
	 * @abstract
	 */
	abstract public function configure(OptionResolver $resolver);

	/**
	 * Execute/setup the current block instance.
	 *
	 * @access public
	 * @return mixed
	 * @abstract
	 */
	abstract public function execute();

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

	/**
	 * Render the block.
	 *
	 * @access public
	 * @return void
	 */
	public function render()
	{
		// intentionally left blank
	}

	/**
	 * @param  int $ttl
	 * @return $this
	 */
	public function setTtl($ttl)
	{
		$this->ttl = $ttl;
		return $this;
	}

	/**
	 * Get the block ttl.
	 *
	 * @access public
	 * @return int
	 */
	public function getTtl()
	{
		return $this->ttl;
	}

}