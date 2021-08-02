<?php

require_once __DIR__ . '/ComplexNumber.php';

/**
 * Description of Generator.php
 *
 * @author puld
 */
class Helper
{
	public static function make(bool $nil = false)
	{
		$a = $nil ? 0.0 : mt_rand(-100, 100) / 10;
		$b = $nil ? 0.0 : mt_rand(-100, 100) / 10;
		return new ComplexNumber($a, $b);
	}

	public static function add(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		//(a + bi) + (c + di) = (a + c) + (b + d)i
		return new ComplexNumber($a + $c, $b + $d);
	}

	public static function sub(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		//(a + bi) - (c + di) = (a - c) + (b - d)i
		return new ComplexNumber($a - $c, $b - $d);
	}

	public static function 	mult(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		// (a + bi) * (c + di) = (ac - bd) + (bc + ad)i
		return new ComplexNumber($a * $c - $b * $d, $b * $c + $a * $d);
	}

	public static function div(ComplexNumber $u, ComplexNumber $v): ComplexNumber
	{
		list ($a, $b) = $u->extract();
		list ($c, $d) = $v->extract();

		// (a + bi) / (c + di) = ( (ac + bd) / (c^2 + b^2) )  +  ( (bc - ad) / (c^2 + b^2) )i
		// c функцией pow запись будет менее читаемая
		return new ComplexNumber(($a * $c + $b * $d) / ($c * $c + $b * $b), ($b * $c - $a * $d) / ($c * $c + $b * $b));
	}

	public static function eq(ComplexNumber $u, ComplexNumber $v): bool
	{
		return ($u->a === $v->a) && ($u->b === $v->b);
	}

	public static function negative(ComplexNumber $u) : ComplexNumber
	{
		list ($a, $b) = $u->extract();
		return new ComplexNumber(-$a, -$b);
	}
}