<?php # -*- coding: utf-8 -*-

namespace StringTheory\Type;

/**
 * Class MbString
 *
 * @package StringTheory\Type
 */
class MbString implements StringType {

	/**
	 * @var string
	 */
	private $sting;

	/**
	 * @var int
	 */
	private $length;

	/**
	 * @var string
	 */
	private $encoding;

	/**
	 * @param string $string
	 * @param string $encoding (Optional, default to UTF-8)
	 */
	public function __construct( $string, $encoding = 'UTF-8' ) {

		$this->sting    = (string) $string;
		$this->encoding = (string) $encoding;
	}

	/**
	 * @return string
	 */
	public function __toString() {

		return $this->sting;
	}

	/**
	 * @param int $offset
	 *
	 * @return bool
	 */
	public function offsetExists( $offset ) {

		return $offset < $this->length();
	}

	/**
	 * @param int $offset
	 *
	 * @return string
	 */
	public function offsetGet( $offset ) {

		return mb_substr(
			$this->sting,
			(int) $offset,
			1,
			$this->encoding
		);
	}

	/**
	 * This method does not affect the string.
	 * It's an immutable object.
	 *
	 * @param int $offset
	 * @param string $value
	 *
	 * @return void
	 */
	public function offsetSet( $offset, $value ) {}

	/**
	 * This method does not affect the string.
	 * It's an immutable object.
	 *
	 * @param int $offset
	 */
	public function offsetUnset( $offset ) {}

	/**
	 * @return int
	 */
	private function length() {

		if ( is_int( $this->length ) )
			return $this->length;

		$this->length = mb_strlen( $this->sting, $this->encoding );

		return $this->length;
	}
}