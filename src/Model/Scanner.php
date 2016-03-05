<?php # -*- coding: utf-8 -*-

namespace StringTheory\Model;

use
	Iterator;

/**
 * Interface Scanner
 *
 * @package StringTheory\Model
 */
interface Scanner extends Iterator {

	/**
	 * @return void
	 */
	public function previous();

	/**
	 * @return int
	 */
	public function position();

	/**
	 * @return int
	 */
	public function line();
}