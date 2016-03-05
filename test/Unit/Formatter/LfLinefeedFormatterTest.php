<?php # -*- coding: utf-8 -*-

namespace StringTheory\Formatter;

use
	PHPUnit_Framework_TestCase;

class LfLinefeedFormatterTest extends PHPUnit_Framework_TestCase {

	public function test_normalize_lf_crlf() {

		$string   = "a\r\nb";
		$expected = "a\nb";
		$testee   = new LfLinefeedFormatter;

		$this->assertSame(
			$expected,
			$testee->normalize_lf( $string )
		);
	}

	public function test_normalize_lf_cr() {

		$string   = "a\rb";
		$expected = "a\nb";
		$testee   = new LfLinefeedFormatter;

		$this->assertSame(
			$expected,
			$testee->normalize_lf( $string )
		);
	}

	public function test_normalize_lf_mixed() {

		$cr       = "\r";
		$lf       = "\n";
		$crlf     = $cr . $lf;
		$string   = "a{$crlf}b{$cr}c{$lf}d{$cr}{$cr}e{$lf}{$cr}";
		$expected = "a{$lf}b{$lf}c{$lf}d{$lf}{$lf}e{$lf}{$lf}";
		$testee   = new LfLinefeedFormatter;

		$this->assertSame(
			$expected,
			$testee->normalize_lf( $string )
		);
	}

	public function test_normalize_lf_mb() {

		$cr       = "\r";
		$lf       = "\n";
		$crlf     = $cr . $lf;
		$string   = "苍{$crlf}b{$cr}苍天{$lf}d{$cr}{$crlf}有{$lf}{$cr}";
		$expected = "苍{$lf}b{$lf}苍天{$lf}d{$lf}{$lf}有{$lf}{$lf}";
		$testee   = new LfLinefeedFormatter;

		$this->assertSame(
			$expected,
			$testee->normalize_lf( $string )
		);
	}
}
