<?php

/**
 * Description of ComplexNumber.php
 *
 * @author puld
 */
class ComplexNumber
{
	/**
	 * Вещественная часть
	 */
	public float $a;

	/**
	 * Мнимая часть
	 */
	public float $b;

	function __construct(float $a, float $b)
	{
		$this->a = $a;
		$this->b = $b;
	}

	public function __toString(): string
	{
		$aFormat = number_format($this->a, 2, '.', '');
		$bFormat = number_format($this->b, 2, '.', '');
		return "$aFormat + $bFormat i";
	}

	public function extract(): array
	{
		return array($this->a, $this->b);
	}
}