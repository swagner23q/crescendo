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
            $img = "/fake/path/image1.jpg";
			$price = 3.99;
			$test_product = new Product($gender, $type_id, $name, $description, $img, $price);
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
	  		$img = "/fake/path/image1.jpg";
			$price = 3.99;
			$test_product = new Product($gender, $type_id, $name, $description, $img, $price);
			$test_product->save();

			$gender = "F";
			$type_id = 2;
      		$name= "Dockers Preated Khackis";
			$description = "Lame ass khaki pants with pleats";
      		$img = "/fake/path/image2.jpg";
			$price = 10.99;
			$test_product2 = new Product($gender, $type_id, $name, $description, $img, $price);
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
	      	 $img = "/fake/path/image1.jpg";
			 $price = 3.99;
			 $test_product = new Product($gender, $type_id, $name, $description, $img, $price);
			 $test_product->save();

			 $gender = "F";
			 $type_id = 2;
		     $name= "Dockers Preated Khackis";
			 $description = "Lame ass khaki pants with pleats";
	      	 $img = "/fake/path/image2.jpg";
			 $price = 5.89;
			 $test_product2 = new Product($gender, $type_id, $name, $description, $img, $price);
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
	   		 $img = "/fake/path/image1.jpg";
			 $price = 10.99;
		 	 $test_product = new Product($gender, $type_id, $name, $description, $img, $price);
		 	 $test_product->save();

			 $gender2 = "F";
		 	 $type_id2 = 2;
	   		 $name2= "Dockers Pleated Khackis";
		 	 $description2 = "Lame ass khaki pants with pleats";
	   		 $img2 = "/fake/path/image2.jpg";
			 $price = 3.99;
		 	 $test_product2 = new Product($gender, $type_id, $name, $description, $img, $price);
		 	 $test_product2->save();

	         //Act
	         $result = Product::find($test_product->getId());

	         //Arrange
	         $this->assertEquals($test_product, $result);
	  	 }


		 function testFindByTypeAndGender()
		 {
		 	 //Arrange
			 $gender = "L";
		 	 $type_id = 5;
		 	 $name = "Polo Button Down";
		 	 $description = "Light Blue button down shirt";
	   		 $img = "/fake/path/image1.jpg";
			 $price = 3.99;
		 	 $test_product = new Product($gender, $type_id, $name, $description, $img, $price);
		 	 $test_product->save();

			 $gender2 = "F";
		 	 $type_id2 = 2;
	   		 $name2= "Dockers Pleated Khackis";
		 	 $description2 = "Lame ass khaki pants with pleats";
	   		 $img2 = "/fake/path/image2.jpg";
			 $price = 1.99;
		 	 $test_product2 = new Product($gender2, $type_id2, $name2, $description2, $img2, $price);
		 	 $test_product2->save();


			 //Act

	         $result = Product::findByTypeAndGender($test_product->getTypeId(), $test_product->getGender());

	         //Arrange
	         $this->assertEquals([$test_product], $result);

	 	}



	}

?>
