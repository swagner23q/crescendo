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
			$this->assertEquals($test_client, $result);
		}

	}

?>
