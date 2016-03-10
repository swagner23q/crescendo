<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	include ("db/db_test_connection.php");

	class ProductTest extends PHPUnit_Framework_TestCase
	{
		protected function tearDown()
		{
			Order::deleteAll();
			User::deleteAll();
            Product::deleteAll();
		}

		function test_save()
		{
			//Arrange
			$gender = "M";
			$type_id = 1;
			$name = "Polo Button Down";
			$description = "Light Blue button down shirt";
			$price = 3.99;
            $img = "/fake/path/image1.jpg";
			$test_product = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product->save();

			//Act
			$result = Product::getAll();

			//Assert
			$this->assertEquals([$test_product], $result);
		}



	}

?>
