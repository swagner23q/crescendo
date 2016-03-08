<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	include ("db/db_test_connection.php");

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
			$f_name = "Jason";
			$l_name = "Awbrey";
			$email = "jason.s.awbrey@gmail.com";
			$phone = "503-939-9407";
			$password = "password";
			$ship_street = "123 Test Street";
			$ship_apt = "APT 32";
			$ship_city = "Portland";
			$ship_state = "OR";
			$ship_postal = "97212";
			$bill_street = "123 Test Street";
			$bill_apt = "APT 32";
			$bill_city = "Portland";
			$bill_state = "OR";
			$bill_postal = "97212";
			$test_user = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user->save();

			$user_id = $test_user->getId();
			$ship_type = 1;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order = new Order($user_id, $ship_type, $date, $line_items);
			$test_order->save();

			//Act
			$result = Order::getAll();

			//Assert
			$this->assertEquals([$test_order], $result);
		}

		function test_getAll()
		{
			//Arrange
			$f_name = "Jason";
			$l_name = "Awbrey";
			$email = "jason.s.awbrey@gmail.com";
			$phone = "503-939-9407";
			$password = "password";
			$ship_street = "123 Test Street";
			$ship_apt = "APT 32";
			$ship_city = "Portland";
			$ship_state = "OR";
			$ship_postal = "97212";
			$bill_street = "123 Test Street";
			$bill_apt = "APT 32";
			$bill_city = "Portland";
			$bill_state = "OR";
			$bill_postal = "97212";
			$test_user = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user->save();

			$user_id = $test_user->getId();
			$ship_type = 1;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order = new Order($user_id, $ship_type, $date, $line_items);
			$test_order->save();

			$user_id = $test_user->getId();
			$ship_type = 2;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order2 = new Order($user_id, $ship_type, $date, $line_items);
			$test_order2->save();

			//Act
			$result = Order::getAll();

			//Assert
			$this->assertEquals([$test_order, $test_order2], $result);
		}

		function test_deleteAll()
		{
			//Arrange
			$f_name = "Jason";
			$l_name = "Awbrey";
			$email = "jason.s.awbrey@gmail.com";
			$phone = "503-939-9407";
			$password = "password";
			$ship_street = "123 Test Street";
			$ship_apt = "APT 32";
			$ship_city = "Portland";
			$ship_state = "OR";
			$ship_postal = "97212";
			$bill_street = "123 Test Street";
			$bill_apt = "APT 32";
			$bill_city = "Portland";
			$bill_state = "OR";
			$bill_postal = "97212";
			$test_user = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user->save();

			$user_id = $test_user->getId();
			$ship_type = 1;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order = new Order($user_id, $ship_type, $date, $line_items);
			$test_order->save();

			$user_id = $test_user->getId();
			$ship_type = 2;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order2 = new Order($user_id, $ship_type, $date, $line_items);
			$test_order2->save();

			//Act
			Order::deleteAll();
			$result = Order::getAll();

			//Assert
			$this->assertEquals([], $result);
		}

		function test_find()
		{
			//Arrange
			$f_name = "Jason";
			$l_name = "Awbrey";
			$email = "jason.s.awbrey@gmail.com";
			$phone = "503-939-9407";
			$password = "password";
			$ship_street = "123 Test Street";
			$ship_apt = "APT 32";
			$ship_city = "Portland";
			$ship_state = "OR";
			$ship_postal = "97212";
			$bill_street = "123 Test Street";
			$bill_apt = "APT 32";
			$bill_city = "Portland";
			$bill_state = "OR";
			$bill_postal = "97212";
			$test_user = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user->save();

			$user_id = $test_user->getId();
			$ship_type = 1;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order = new Order($user_id, $ship_type, $date, $line_items);
			$test_order->save();

			$user_id = $test_user->getId();
			$ship_type = 2;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order2 = new Order($user_id, $ship_type, $date, $line_items);
			$test_order2->save();

			//Act
			$result = Order::find($test_order2->getId());

			//Assert
			$this->assertEquals($test_order2, $result);
		}

		function test_checkout()
		{
			//Arrange
			$f_name = "Jason";
			$l_name = "Awbrey";
			$email = "jason.s.awbrey@gmail.com";
			$phone = "503-939-9407";
			$password = "password";
			$ship_street = "123 Test Street";
			$ship_apt = "APT 32";
			$ship_city = "Portland";
			$ship_state = "OR";
			$ship_postal = "97212";
			$bill_street = "123 Test Street";
			$bill_apt = "APT 32";
			$bill_city = "Portland";
			$bill_state = "OR";
			$bill_postal = "97212";
			$test_user = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user->save();

			$user_id = $test_user->getId();
			$ship_type = 1;
			$date = "2016-03-06";
			$line_items = [['product_id' => 1, 'qty' => 1]];
			$test_order = new Order($user_id, $ship_type, $date, $line_items);
			$test_order->save();

			//Act
			$test_order->checkout();
			$result = $test_order->getOrderDetails();

			//Assert
			$this->assertEquals(['product_id' => 1, 'qty' => 1, 'name' => 'Blue Shirt' ], $result)
		}

		// function test_getOrderDetails()
		// {
		//
		// 	//Arrange
		// 	$f_name = "Jason";
		// 	$l_name = "Awbrey";
		// 	$email = "jason.s.awbrey@gmail.com";
		// 	$phone = "503-939-9407";
		// 	$password = "password";
		// 	$ship_street = "123 Test Street";
		// 	$ship_apt = "APT 32";
		// 	$ship_city = "Portland";
		// 	$ship_state = "OR";
		// 	$ship_postal = "97212";
		// 	$bill_street = "123 Test Street";
		// 	$bill_apt = "APT 32";
		// 	$bill_city = "Portland";
		// 	$bill_state = "OR";
		// 	$bill_postal = "97212";
		// 	$test_user = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
		// 	$test_user->save();
		//
		// 	$user_id = $test_user->getId();
		// 	$ship_type = 1;
		// 	$date = "2016-03-06";
		// 	$line_items = NULL;
		// 	$test_order = new Order($user_id, $ship_type, $date, $line_items);
		// 	$test_order->save();
		//
		//
		//
		// }

	}

?>
