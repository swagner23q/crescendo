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

		static function find($search_id)
        {
            $found_user = null;
            $users = User::getAll();
            foreach($users as $user) {
                $user_id = $user->getId();
                if ($user_id == $search_id) {
                  $found_user = $user;
                }
            }
            return $found_user;
        }

		static function findByEmail()
		{

		}

		function update($new_f_name, $new_l_name, $new_email, $new_phone, $new_password, $new_ship_street, $new_ship_apt, $new_ship_city, $new_ship_state, $new_ship_postal, $new_bill_street, $new_bill_apt, $new_bill_city, $new_bill_state, $new_bill_postal)
		{
			$GLOBALS['DB']->exec(
			"UPDATE users
			SET
			f_name = '{$new_f_name}',
			l_name = '{$new_l_name}',
			email = '{$new_email}',
			phone = '{$new_phone}',
			password = '{$new_password}',
			ship_street = '{$new_ship_street}',
			ship_apt = '{$new_ship_apt}',
			ship_city = '{$new_ship_city}',
			ship_state = '{$new_ship_state}',
			ship_postal = '{$new_ship_postal}',
			bill_street = '{$new_bill_street}',
			bill_apt = '{$new_bill_apt}',
			bill_city = '{$new_bill_city}',
			bill_state = '{$new_bill_state}',
			bill_postal = '{$new_bill_postal}'

			WHERE id = {$this->getId()};");
			$this->setFirstName($new_f_name);
			$this->setLastName($new_l_name);
			$this->setEmail($new_email);
			$this->setPhone($new_phone);
			$this->setPassword($new_password);
			$this->setShipStreet($new_ship_street);
			$this->setShipApt($new_ship_apt);
			$this->setShipCity($new_ship_city);
			$this->setShipState($new_ship_state);
			$this->setShipPostal($new_ship_postal);
			$this->setBillStreet($new_bill_street);
			$this->setBillApt($new_bill_apt);
			$this->setBillCity($new_bill_city);
			$this->setBillState($new_bill_state);
			$this->setBillPostal($new_bill_postal);
		}

		function deleteUser()
        {
            $GLOBALS['DB']->exec("DELETE FROM users WHERE id = {$this->getId()};");
        }


		function getOrderHistory()
		{
			$query = $GLOBALS['DB']->query(
				"SELECT orders.*
				FROM users
				JOIN orders ON (users.id = orders.user_id)
				WHERE user_id = {$this->getId()}
				ORDER BY date"
			);
			$orders = [];
			foreach($query as $order)
			{
				$user_id = $order['user_id'];
				$ship_type = $order['ship_type'];
				$date = $order['date'];
				// $line_items = NULL;
				$id = $order['id'];
				$new_order = new Order($user_id, $ship_type, $date,	$line_items = NULL, $id);
				$orders[] = $new_order;
			}
			return $orders;
		}


		//broken, only checks the first user and returns FALSE!!! so no other users can be checked
		static function passwordVerify($email, $password)
		{
			   $found_user_id = null;
			   $users = User::getAll();
			   foreach($users as $user) {
			       $user_email = $user->getEmail();
			       $user_password= $user->getPassword();
			       if ($user_email == $email && $user_password == $password) {
			         $found_user_id = $user;
					 return $found_user_id->getId();
				 } else {
					 return FALSE;
				 }
		   }
		}
		// static function passwordVerify($email, $password)
		// {
		// 	   $found_user_id = null;
		// 	   $users = User::getAll();
		// 	   foreach($users as $user) {
		// 		   $user_email = $user->getEmail();
		// 		   $user_password= $user->getPassword();
		// 		   if ($user_email == $email && $user_password == $password) {
		// 			 $found_user_id = $user;
		// 			 return $found_user_id->getId();
		// 		 } else {
		// 			 return FALSE;
		// 		 }
		//    }
		// }
	}
 ?>
