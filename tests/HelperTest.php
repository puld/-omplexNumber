<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . '/../src/ComplexNumber.php';
require_once __DIR__ . '/../src/Helper.php';

/**
 * Description of HelperTest.php
 *
 * @author puld
 */
class HelperTest extends \PHPUnit\Framework\TestCase
{
	public function testEq()
	{
		$u = new ComplexNumber(1.3, 2.5);
		$v = new ComplexNumber(2.4, -7.8);
		$this->assertTrue(Helper::eq($u, $u));
		$this->assertFalse(Helper::eq($u, $v));
	}

	public function testNegative()
	{
		$a = new ComplexNumber(1, 1);
		$b = new ComplexNumber(-1, -1);

		$this->assertEquals(Helper::negative($a), $b, "Противоположность числа не выполняется");
	}

	function testAdd()
	{
		$a = Helper::make();
		$b = Helper::make();
		$c = Helper::make();
		$nil = Helper::make(true);

		//Коммутативность (переместительность)
		$this->assertEquals(Helper::add($a, $b), Helper::add($b, $a), "Коммутативность (переместительность) не выполняется");

		//Ассоциативность (сочетательность)
		$this->assertEquals(Helper::add($a, Helper::add($b, $c)), Helper::add(Helper::add($a, $b), $c), "Ассоциативность (сочетательность) не выполняется");

		//Свойство нуля
		$this->assertEquals(Helper::add($a, $nil), $a, "Свойство нуля не выполняется");

		//Свойство противоположного элемента
		$this->assertEquals(Helper::add($a, Helper::negative($a)), $nil, "Свойство нуля не выполняется");
	}

	public function testSub()
	{
		$a = Helper::make();
		$b = Helper::make();

		//Выполнение вычитания через сложение
		$this->assertEquals(Helper::sub($a, $b), Helper::add($a, Helper::negative($b)), "Вычитания через сложение не выполняется");
	}

	/**
	 * @param ComplexNumber $u
	 * @param ComplexNumber $v
	 * @return ComplexNumber
	 */
	public function testMult()
	{
		$a = Helper::make();
		$b = Helper::make();
		$c = Helper::make();
		$nil = Helper::make(true);
		$one = new ComplexNumber(1, 1);

		//Коммутативность (переместительность)
		$this->assertEquals(Helper::mult($a, $b), Helper::mult($b, $a), "Коммутативность (переместительность) не выполняется");

		//Ассоциативность (сочетательность)
		$this->assertEquals(Helper::mult($a, Helper::mult($b, $c)), Helper::mult(Helper::mult($a, $b), $c), "Ассоциативность (сочетательность) не выполняется");

		//Свойство нуля
		$this->assertEquals(Helper::mult($a, $nil), $nil, "Свойство нуля не выполняется");

		//Дистрибутивность (распределительность) умножения относительно сложения
		$this->assertEquals(Helper::mult($a, Helper::add($b,$c)), Helper::add(Helper::mult($a, $b), Helper::mult($a, $c)) , "Дистрибутивность (распределительность) умножения относительно сложения не выполняется");
	}
}