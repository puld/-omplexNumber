<?php

require_once __DIR__ . '/ComplexNumber.php';

/**
 * Description of Generator.php
 *
 * @author puld
 */
class Helper
{

	static function make()
	{
		$a = mt_rand(10, 100) / 10;
		$b = mt_rand(10, 100) / 10;
		return new ComplexNumber($a, $b);
	}

	static function add(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		//(a + bi) + (c + di) = (a + c) + (b + d)i
		return new ComplexNumber($a + $c, $b + $d);
	}

	static function sub(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		//(a + bi) - (c + di) = (a - c) + (b - d)i
		return new ComplexNumber($a - $c, $b - $d);
	}

	/**
	 * @param ComplexNumber $u
	 * @param ComplexNumber $v
	 * @return ComplexNumber
	 */
	static function mult(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		// (a + bi) * (c + di) = (ac - bd) + (bc + ad)i
		return new ComplexNumber($a * $c - $b * $d, $b * $c + $a * $d);
	}

	static function div(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		// (a + bi) / (c + di) = ( (ac + bd) / (c^2 + b^2) )  +  ( (bc - ad) / (c^2 + b^2) )i
		// c функцией pow запись будет менее читаемая
		return new ComplexNumber(($a * $c + $b * $d) / ($c * $c + $b * $b), ($b * $c - $a * $d) / ($c * $c + $b * $b));
	}

	static function eq(ComplexNumber $u, ComplexNumber $v): bool
	{
		return ($u->a === $v->a) && ($u->b === $v->b);
	}
}