<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	include ("db/db_test_connection.php");

	session_start();

	class ProductTest extends PHPUnit_Framework_TestCase
	{
		protected function tearDown()
		{
			Order::deleteAll();
			User::deleteAll();
            Product::deleteAll();
			$_SESSION['cart'] = array();
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

		function test_getAll()
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

			$gender = "F";
			$type_id = 2;
      		$name= "Dockers Preated Khackis";
			$description = "Lame ass khaki pants with pleats";
			$price = 10.99;
      		$img = "/fake/path/image2.jpg";
			$test_product2 = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product2->save();

			//Act
			$result = Product::getAll();

			//Assert
			$this->assertEquals([$test_product, $test_product2], $result);
		}

		function test_deleteAll()
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

			$gender = "F";
			$type_id = 2;
		    $name= "Dockers Preated Khackis";
			$description = "Lame ass khaki pants with pleats";
			$price = 5.89;
	      	$img = "/fake/path/image2.jpg";
			$test_product2 = new Product($gender, $type_id, $name, $description, $price,$img);
			$test_product2->save();

			//Act
			Product::deleteAll();
			$result = Product::getAll();

			//Assert
			$this->assertEquals([], $result);
		}

	    function testFind()
	    {
	    	//Arrange
			$gender = "M";
			$type_id = 1;
			$name = "Polo Button Down";
			$description = "Light Blue button down shirt";
			$price = 10.99;
	   		$img = "/fake/path/image1.jpg";
			$test_product = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product->save();

			$gender2 = "F";
		 	$type_id2 = 2;
	   		$name2= "Dockers Pleated Khackis";
		 	$description2 = "Lame ass khaki pants with pleats";
			$price = 3.99;
	   		$img2 = "/fake/path/image2.jpg";
			$test_product2 = new Product($gender, $type_id, $name, $description, $price,$img);
		 	$test_product2->save();

	        //Act
	        $result = Product::find($test_product->getId());

	        //Arrange
	        $this->assertEquals($test_product, $result);
	  	}


		function testFindByTypeAndGender()
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

			$gender = "F";
			$type_id = 2;
	   		$name = "Dockers Pleated Khackis";
			$description = "Lame ass khaki pants with pleats";
			$price = 1.99;
	   		$img = "/fake/path/image2.jpg";
			$test_product2 = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product2->save();


			//Act
	        $result = Product::findByTypeAndGender($test_product->getTypeId(), $test_product->getGender());

	        //Arrange
	        $this->assertEquals([$test_product], $result);

	 	}

		function testTypeName()
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
			$result = Product::getTypeName($test_product->getTypeId());


			//Arrange
			$this->assertEquals("shirt", $result);

	 }

		function testCalculateCartItemPrice()

		{
			$gender = "M";
			$type_id = 1;
			$name = "Polo Button Down";
			$description = "Light Blue button down shirt";
			$price = 3.99;
			$img = "/fake/path/image1.jpg";
			$test_product = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product->save();

			$gender = "F";
			$type_id = 2;
			$name = "Dockers Pleated Khackis";
			$description = "Lame ass khaki pants with pleats";
			$price = 1.99;
			$img = "/fake/path/image2.jpg";
			$test_product2 = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product2->save();

			$_SESSION['cart'] = array([$test_product->getId(),3]);

			$result = Product::calculateTotalCartPrice();

			$this->assertEquals(11.97, $result);
		}

		function testCalculateTotalCartPrice()

		{
			$gender = "M";
			$type_id = 1;
			$name = "Polo Button Down";
			$description = "Light Blue button down shirt";
			$price = 3.99;
			$img = "/fake/path/image1.jpg";
			$test_product = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product->save();

			$gender = "F";
			$type_id = 2;
			$name = "Dockers Pleated Khackis";
			$description = "Lame ass khaki pants with pleats";
			$price = 1.99;
			$img = "/fake/path/image2.jpg";
			$test_product2 = new Product($gender, $type_id, $name, $description, $price, $img);
			$test_product2->save();

			$_SESSION['cart'] = array([$test_product->getId(),3], [$test_product2->getId(), 2]);

			$result = Product::calculateTotalCartPrice();

			$this->assertEquals(15.95, $result);
		}
	}
?>
