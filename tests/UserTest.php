<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	include ("db/db_test_connection.php");

	class UserTest extends PHPUnit_Framework_TestCase
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

			//Act
			$result = User::getAll();

			//Assert
			$this->assertEquals([$test_user], $result);
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

			$f_name = "Brandi";
			$l_name = "Dunkinsell";
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
			$test_user2 = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user2->save();

			//Act
			$result = User::getAll();

			//Assert
			$this->assertEquals([$test_user, $test_user2], $result);
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

			$f_name = "Brandi";
			$l_name = "Dunkinsell";
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
			$test_user2 = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user2->save();

			//Act
			User::deleteAll();
			$result = User::getAll();

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

			$f_name = "Brandi";
			$l_name = "Dunkinsell";
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
			$test_user2 = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user2->save();

			//Act
			$result = User::find($test_user->getId());

			//Assert
			$this->assertEquals($test_user, $result);
		}

		function test_update()
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

			$new_f_name = "Mojo";
			$new_l_name = "Jojo";
			$new_email = "jason.s.awbrey@gmail.com";
			$new_phone = "503-555-5555";
			$new_password = "password";
			$new_ship_street = "1234 Test Street";
			$new_ship_apt = "APT 12";
			$new_ship_city = "Portland";
			$new_ship_state = "OR";
			$new_ship_postal = "97212";
			$new_bill_street = "1234 Test Street";
			$new_bill_apt = "APT 12";
			$new_bill_city = "Portland";
			$new_bill_state = "OR";
			$new_bill_postal = "97212";

			//Act
			$test_user->update($new_f_name, $new_l_name, $new_email, $new_phone, $new_password, $new_ship_street, $new_ship_apt, $new_ship_city, $new_ship_state, $new_ship_postal, $new_bill_street, $new_bill_apt, $new_bill_city, $new_bill_state, $new_bill_postal);

			//Assert
			$this->assertEquals(["Mojo", "Jojo", "jason.s.awbrey@gmail.com", "503-555-5555", "password", "1234 Test Street", "APT 12", "Portland", "OR", "97212", "1234 Test Street", "APT 12", "Portland", "OR", "97212"], [$test_user->getFirstName(), $test_user->getLastName(), $test_user->getEmail(), $test_user->getPhone(), $test_user->getPassword(), $test_user->getShipStreet(), $test_user->getShipApt(), $test_user->getShipCity(), $test_user->getShipState(), $test_user->getShipPostal(), $test_user->getBillStreet(), $test_user->getBillApt(), $test_user->getBillCity(), $test_user->getBillState(), $test_user->getBillPostal()]);
		}

		function test_deleteUser()
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

			$f_name = "Brandi";
			$l_name = "Dunkinsell";
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
			$test_user2 = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal);
			$test_user2->save();

			//Act
			$test_user->deleteUser();

			//Assert
			$this->assertEquals([$test_user2], User::getAll());
		}

		function test_getOrderHistory()
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
			$ship_type = 3;
			$date = "2016-03-06";
			$line_items = NULL;
			$test_order2 = new Order($user_id, $ship_type, $date, $line_items);
			$test_order2->save();

			//Act
			$result = $test_user->getOrderHistory();
			//Assert
			$this->assertEquals([$test_order, $test_order2], $result);
		}

		// function test_passwordVerify($email, $password)
		// {
		//
		// }

	}

?>
