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

	function __construct(float $a, float $b, bool $asTrigonometricForm = false)
	{
		if ($asTrigonometricForm)
		{
			$this->a = $a * cos($b);
			$this->b = $a * sin($b);
		}
		else
		{
			$this->a = $a;
			$this->b = $b;
		}
	}

	public function __toString(): string
	{
		$aFormat = number_format($this->a, 2, '.', '');
		$bFormat = number_format(abs($this->b), 2, '.', '');
		$op = $this->b < 0.0 ? '-' : '+';
		return "$aFormat $op $bFormat i";
	}

	public function extract(): array
	{
		return array($this->a, $this->b);
	}
}