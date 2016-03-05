<?php # -*- coding: utf-8 -*-

namespace StringTheory\Model;

use
	PHPUnit_Framework_TestCase;

class MbScannerTest extends PHPUnit_Framework_TestCase {

	public function test_current() {

		$string  = 'ФБŞ';
		$current = 'Ф';

		$testee = new MbScanner( $string, 'UTF-8' );
		$this->assertSame(
			$current,
			$testee->current()
		);
	}

	public function test_next() {

		$string  = 'aÚc';
		$current = 'Ú';

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next();
		$this->assertSame(
			$current,
			$testee->current()
		);
	}

	public function test_valid_false() {

		$string  = 'ƒ';

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next();
		$this->assertFalse(
			$testee->valid()
		);
	}

	public function test_valid_true() {

		$string  = 'aₑb';

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next();
		$this->assertTrue(
			$testee->valid()
		);
	}

	public function test_line() {

		$string  = "â\nđ\nc";

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next(); // "\n"
		$testee->next(); // "đ"
		$this->assertSame(
			1,
			$testee->line()
		);

		$testee->next(); // "\n"
		$this->assertSame(
			1,
			$testee->line()
		);
		$testee->next(); // "c"
		$this->assertSame(
			2,
			$testee->line()
		);
	}

	public function test_rewind() {

		$string = 'abc';
		$first  = 'a';

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next();
		$testee->next();
		$testee->rewind();
		$this->assertSame(
			$first,
			$testee->current()
		);
	}

	public function test_invalid_current() {

		$string = '№';

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next();

		$this->assertSame(
			'',
			$testee->current()
		);
	}

	public function test_previous() {

		$string = '¹₂³';
		$first  = '¹';

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next(); // "₂"
		$testee->previous();

		$this->assertSame(
			$first,
			$testee->current()
		);
	}

	public function test_current_han() {

		$string  = '苍天有';
		$third = '有';

		$testee = new MbScanner( $string, 'UTF-8' );
		$testee->next(); // "天"
		$testee->next(); // "有"
		$this->assertSame(
			$third,
			$testee->current()
		);

	}
}
