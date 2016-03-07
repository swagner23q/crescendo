<?php

	 class User
		{

			private $f_name;
			private $l_name;
			private $email;
			private $phone;
			private $password;
			private $ship_street;
			private $ship_apt;
			private $ship_city;
			private $ship_state;
			private $ship_postal;
			private $bill_street;
			private $bill_apt;
			private $bill_city;
			private $bill_state;
			private $bill_postal;
			private $id;

		function __construct($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal, $id = NULL)
		{
			$this->f_name = $f_name;
			$this->l_name = $l_name;
			$this->email = $email;
			$this->phone = $phone;
			$this->password = $password;
			$this->ship_street = $ship_street;
			$this->ship_apt = $ship_apt;
			$this->ship_city = $ship_city;
			$this->ship_state = $ship_state;
			$this->ship_postal = $ship_postal;
			$this->bill_street = $bill_street;
			$this->bill_apt = $bill_apt;
			$this->bill_city = $bill_city;
			$this->bill_state = $bill_state;
			$this->bill_postal = $bill_postal;
			$this->id = $id;
		}

		function getFirstName()
		{
			return $this->f_name;
		}

		function setFirstName($f_name)
		{
			$this->f_name = $f_name;
		}

		function getLastName()
		{
			return $this->l_name;
		}

		function setLastName($l_name)
		{
			$this->l_name = $l_name;
		}

		function getEmail()
		{
			return $this->email;
		}

		function setEmail($email)
		{
			$this->email = $email;
		}

		function getPhone()
		{
			return $this->phone;
		}

		function setPhone($phone)
		{
			$this->phone = $phone;
		}

		function getPassword()
		{
			return $this->password;
		}

		function setPassword($password)
		{
			$this->password = $password;
		}

		function getShipStreet()
		{
			return $this->ship_street;
		}

		function setShipStreet($ship_street)
		{
			$this->ship_street = $ship_street;
		}

		function getShipApt()
		{
			return $this->ship_apt;
		}

		function setShipApt($ship_apt)
		{
			$this->ship_apt = $ship_apt;
		}

		function getShipCity()
		{
			return $this->ship_city;
		}

		function setShipCity($ship_city)
		{
			$this->ship_city = $ship_city;
		}

		function getShipState()
		{
			return $this->ship_state;
		}

		function setShipState($ship_state)
		{
			$this->ship_state = $ship_state;
		}

		function getShipPostal()
		{
			return $this->ship_postal;
		}

		function setShipPostal($ship_postal)
		{
			$this->ship_postal = $ship_postal;
		}

		function getBillStreet()
		{
		    return $this->bill_street;
		}

		function setBillStreet($bill_street)
		{
		    $this->bill_street = $bill_street;
		}

		function getBillApt()
		{
		    return $this->bill_apt;
		}

		function setBillApt($bill_apt)
		{
		    $this->bill_apt = $bill_apt;
		}

		function getBillCity()
		{
		    return $this->bill_city;
		}

		function setBillCity($bill_city)
		{
		    $this->bill_city = $bill_city;
		}

		function getBillState()
		{
		    return $this->bill_state;
		}

		function setBillState($bill_state)
		{
		    $this->bill_state = $bill_state;
		}

		function getBillPostal()
		{
		    return $this->bill_postal;
		}

		function setBillPostal($bill_postal)
		{
		    $this->bill_postal = $bill_postal;
		}


		function getId()
		{
			return $this->id;
		}

		function save()
		{
			$GLOBALS['DB']->exec(
		 	   	 "INSERT INTO users
				 (f_name,
				 l_name,
				 email,
				 phone,
				 password,
				 ship_street,
				 ship_apt,
				 ship_city,
				 ship_state,
				 ship_postal,
				 bill_street,
				 bill_apt,
				 bill_city,
				 bill_state,
				 bill_postal)
		 	   	 VALUES
		 	   	 ('{$this->getFirstName()}',
				 '{$this->getLastName()}',
				 '{$this->getEmail()}',
				 '{$this->getPhone()}',
				 '{$this->getPassword()}',
				 '{$this->getShipStreet()}',
				 '{$this->getShipApt()}',
				 '{$this->getShipCity()}',
				 '{$this->getShipState()}',
				 '{$this->getShipPostal()}',
				 '{$this->getBillStreet()}',
				 '{$this->getBillApt()}',
				 '{$this->getBillCity()}',
				 '{$this->getBillState()}',
				 '{$this->getBillPostal()}')"
	 	    );
			$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$returned_users = $GLOBALS['DB']->query("SELECT * FROM users;");
				 	   $users = array();
				 	   foreach($returned_users as $user) {
						  $f_name = $user['f_name'];
 						  $l_name = $user['l_name'];
 						  $email = $user['email'];
 						  $phone = $user['phone'];
 						  $password = $user['password'];
 						  $ship_street = $user['ship_street'];
 						  $ship_apt = $user['ship_apt'];
 						  $ship_city = $user['ship_city'];
 						  $ship_state = $user['ship_state'];
 						  $ship_postal = $user['ship_postal'];
 						  $bill_street = $user['bill_street'];
 						  $bill_apt = $user['bill_apt'];
 						  $bill_city = $user['bill_city'];
 						  $bill_state = $user['bill_state'];
 						  $bill_postal = $user['bill_postal'];
						  $id = $user['id'];
						  $new_user = new User($f_name, $l_name, $email, $phone, $password, $ship_street, $ship_apt, $ship_city, $ship_state, $ship_postal, $bill_street, $bill_apt, $bill_city, $bill_state, $bill_postal, $id);
				 	      array_push($users, $new_user);
				 	   }
				 	   return $users;
		}

		static function deleteAll()
		{
				 	   $GLOBALS['DB']->exec("DELETE FROM users;");
		}
	}

 ?>
