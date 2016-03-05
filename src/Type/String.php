<?php # -*- coding: utf-8 -*-

namespace StringTheory\Type;

use
	ArrayAccess;

/**
 * Interface String
 *
 * @package StringTheory\Type
 */
interface String extends ArrayAccess {

	/**
	 * @return string
	 */
	public function __toString();
}