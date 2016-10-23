<?php # -*- coding: utf-8 -*-

namespace StringTheory\Type;

use
	ArrayAccess;

/**
 * Interface StringType
 *
 * @package StringTheory\Type
 */
interface StringType extends ArrayAccess {

	/**
	 * @return string
	 */
	public function __toString();
}