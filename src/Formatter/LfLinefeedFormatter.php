<?php # -*- coding: utf-8 -*-

namespace StringTheory\Formatter;

use
	StringTheory\Type;

/**
 * Class LfLinefeedFormatter
 *
 * @package StringTheory\Formatter
 */
class LfLinefeedFormatter implements LinefeedFormatter {

	/**
	 * Replaces CRLF and single CR with LF
	 *
	 * @param  Type\String|string $string
	 *
	 * @return string
	 */
	public function normalize_lf( $string ) {

		$string = str_replace( "\r\n", "\n", $string );
		$string = str_replace( "\r", "\n", $string );

		return $string;
	}
}