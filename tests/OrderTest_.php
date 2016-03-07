<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	class OrderTest extends PHPUnit_Framework_TestCase
	{
		protected function tearDown()
		{
			Order::deleteAll();
			User::deleteAll();
		}

		function test_save()
		{
			//Arrange
			$name = "Cathedral";
			$test_brand = new Brand($name);
			$test_brand->save();

			//Act
			$result = Brand::getAll();

			//Assert
			$this->assertEquals([$test_brand], $result);
		}

		function test_getAll()
		{
			//Arrange
			$name = "Cathedral";
			$test_brand = new Brand($name);
			$test_brand->save();

			$name = "Air Jordan";
			$test_brand2 = new Brand($name);
			$test_brand2->save();

			//Act
			$result = Brand::getAll();

			//Assert
			$this->assertEquals([$test_brand, $test_brand2], $result);
		}
		
		function test_deleteAll()
		{
			//Arrange
			$name = "Cathedral";
			$test_brand = new Brand($name);
			$test_brand->save();

			$name = "Air Jordan";
			$test_brand2 = new Brand($name);
			$test_brand2->save();

			//Act
			Brand::deleteAll();
			$result = Brand::getAll();

			//Assert
			$this->assertEquals([], $result);
		}

	}

?>
