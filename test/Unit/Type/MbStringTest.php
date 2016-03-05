<?php # -*- coding: utf-8 -*-

namespace StringTheory\Type;

use
	PHPUnit_Framework_TestCase;

class MbStringTest extends PHPUnit_Framework_TestCase {

	public function test_string_cast() {

		$string = '×³…';
		$testee = new MbString( $string, 'UTF-8' );
		$this->assertSame(
			$string,
			(string) $testee
		);
	}

	public function test_to_string() {

		$string = 'ž₂Ý₃';
		$testee = new MbString( $string, 'UTF-8' );
		$this->assertSame(
			$string,
			$testee->__toString()
		);
	}

	public function test_offset_get() {

		$string = 'ŒÑÏж';
		$chars = [
			'Œ', 'Ñ', 'Ï', 'ж'
		];

		$testee = new MbString( $string, 'UTF-8' );

		foreach ( $chars as $index => $char ) {
			$this->assertSame(
				$char,
				$testee[ $index ],
				"Test failed at position {$index}"
			);
		}
	}

	public function test_offset_get_invalid() {

		$string = 'фэшфэш';
		$testee = new MbString( $string );

		$this->assertSame(
			'',
			$testee[ 6 ]
		);
	}

	public function test_offset_exists() {

		$string = '苍天有';
		$testee = new MbString( $string, 'UTF-8' );
		foreach ( range( 0, 2 ) as $index ) {
			$this->assertArrayHasKey(
				$index,
				$testee,
				"Test failed at position {$index}"
			);
		}
	}

	public function test_offset_not_exists() {

		$string = '苍天有';
		$testee = new MbString( $string, 'UTF-8' );
		$this->assertArrayNotHasKey(
			3,
			$testee
		);
	}

	public function test_offset_not_removable() {

		$string = 'abc';
		$testee = new MbString( $string );
		unset( $testee[ 0 ] );
		$this->assertSame(
			$string,
			(string) $testee
		);
	}

	public function test_offset_not_editable() {

		$string = 'ПХП';
		$testee = new MbString( $string );
		$testee[ 0 ] = 'P';
		$testee[ 1 ] = 'H';
		$testee[ 2 ] = 'P';
		$this->assertSame(
			$string,
			(string) $testee
		);
	}
}
