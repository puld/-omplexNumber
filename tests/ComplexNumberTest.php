<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . '/../src/ComplexNumber.php';

/**
 * Description of ComplexNumberTest.php
 *
 * @author puld
 */
class ComplexNumberTest extends \PHPUnit\Framework\TestCase
{
	public function testCreate()
	{
		$arr = [1.3, 2.5];
		$u = new ComplexNumber($arr[0], $arr[1]);
		$this->assertEquals($arr, $u->extract());
	}

	public function testCreateAsTrigonometricForm()
	{
		$this->assertEquals((new ComplexNumber(2, 0, true))->extract(), [2, 0]);
	}
}