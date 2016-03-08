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
			// Order::deleteAll();
			// User::deleteAll();
      		Product::deleteAll();
		}

		function test_getAll()
		{
			//Arrange
			$name = "Polo Button Down";
			$description = "Light Blue button down shirt";
			$type_id = 2;
			$gender = "m";
      		$img_path = "image1";
			$test_product = new Product($name, $description, $type_id = NULL, $gender, $img_path);
			$test_product->save();

      		$name2= "Dockers Preated Khackis";
			$description2 = "Lame ass khaki pants with pleats";
			$type_id2 = 3;
			$gender2 = "f";
      		$img_path2 = "image1";
			$test_product2 = new Product($name2, $description2, $type_id2 = NULL, $gender2, $img_path2);
			$test_product2->save();

			//Act
			$result = Product::getAll();

			//Assert
			$this->assertEquals([$test_order, $test_order2], $result);
		}

	    function testFind()
	    {
	        //Arrange
			$name = "Polo Button Down";
			$description = "Light Blue button down shirt";
			$type_id = 2;
			$gender = "m";
      		$img_path = "image1";
			$id = 1;
	        $test_product = new Product($name, $description, $type_id = NULL, $gender, $img_path, $id = NULL);
	        $test_product->save();
	        //Act
	        $result = Product::find($test_product->getId());
	        //Arrange
	        $this->assertEquals($test_product, $result);
     	}
	}

?>
