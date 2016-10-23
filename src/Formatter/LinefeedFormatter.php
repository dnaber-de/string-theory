<?php # -*- coding: utf-8 -*-

namespace StringTheory\Formatter;

use
	StringTheory\Type;

/**
 * Interface LinefeedFormatter
 *
 * @package StringTheory\Formatter
 */
interface LinefeedFormatter {

	/**
	 * @param  Type\StringType|string $string
	 *
	 * @return string
	 */
	public function normalize_lf( $string );
}