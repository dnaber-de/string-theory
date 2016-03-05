<?php # -*- coding: utf-8 -*-

namespace StringTheory\Model;

use
	StringTheory\Type;

/**
 * Class MbScanner
 *
 * @package WpPreparedStatementsConverter\Scanner
 */
class MbScanner implements Scanner {

	/**
	 * @var string
	 */
	private $string = '';

	/**
	 * @var int
	 */
	private $lines = 0;

	/**
	 * @var string
	 */
	private $current = '';

	/**
	 * @var int
	 */
	private $line = 0;

	/**
	 * @var int
	 */
	private $position = 0;

	/**
	 * @var string
	 */
	private $encoding = 'UTF-8';

	/**
	 * @param string|Type\String $string
	 * @param string $encoding (Optional, default to UTF-8)
	 */
	public function __construct( $string, $encoding = 'UTF-8' ) {

		$this->string   = (string) $string;
		$this->encoding = (string) $encoding;
		$this->lines    = mb_substr_count( "\n", $this->string );
		$this->rewind();
	}

	/**
	 * Reads the character at the current position
	 */
	private function read_position() {

		$this->current = mb_substr(
			$this->string,
			$this->position,
			1,
			$this->encoding
		);
	}

	/**
	 * Return the current character
	 *
	 * @return string
	 */
	public function current() {

		return $this->current;
	}

	/**
	 * Move forward to next element
	 */
	public function next() {

		if ( "\n" === $this->current )
			$this->line++;

		$this->position++;
		$this->read_position();
	}

	/**
	 * Alias of $this->position()
	 *
	 * @return int
	 */
	public function key() {

		return $this->position();
	}

	/**
	 * Checks if current position is valid
	 *
	 * @return bool
	 */
	public function valid() {

		return (bool) $this->current;
	}

	/**
	 * Rewind the scanner to the first character
	 *
	 * @return void
	 */
	public function rewind() {

		$this->line     = 0;
		$this->position = 0;
		$this->read_position();
	}

	/**
	 * Move the cursor to the previous character
	 *
	 * @return string
	 */
	public function previous() {

		if ( ! $this->position ) {
			$this->current = '';
			return;
		}

		$this->position--;
		$this->read_position();
	}

	/**
	 * @return int
	 */
	public function position() {

		return $this->position;
	}

	/**
	 * @return int
	 */
	public function line() {

		return $this->line;
	}
}