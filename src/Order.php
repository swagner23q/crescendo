<?php

	 class Order
		{

		private $user_id;
		private $ship_type;
		private $date;
		private $line_items;
		private $id;

		function __construct($user_id, $ship_type, $date, $line_items = NULL, $id = NULL)
		{
			$this->user_id = $user_id;
			$this->ship_type = $ship_type;
			$this->date = $date;
			$this->line_items = $line_items;
			$this->id = $id;
		}

		function getUserId()
		{
			return $this->user_id;
		}

		function setUserId($user_id)
		{
			$this->user_id = $user_id;
		}

		function getShipType()
		{
			return $this->ship_type;
		}

		function setShipType($ship_type)
		{
			$this->ship_type = $ship_type;
		}

		function getDate()
		{
			return $this->date;
		}

		function setDate($date)
		{
			$this->date = $date;
		}

		function getLineItem()
		{
			return $this->line_items;
		}

		function setLineItems($line_items)
		{
			$this->line_items = $line_items;
		}

		function getid()
		{
			return $this->id;
		}

		function save()
		{
			$GLOBALS['DB']->exec(
	 	   	 "INSERT INTO orders
	 	   	 (user_id, ship_type, date)
	 	   	 VALUES
		 	   	 ('{$this->getUserId()}',
				 {$this->getShipType()},
				 '{$this->getDate()}'
			 	)"
	 	    );
	 	   	$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$returned_orders = $GLOBALS['DB']->query("SELECT * FROM orders;");
	 	   $orders = array();
	 	   foreach($returned_orders as $order) {
	 	       $user_id = $order['user_id'];
	 	       $ship_type = $order['ship_type'];
	 	       $date = $order['date'];
	 	       $id = $order['id'];
			   $new_order = new Order($user_id, $ship_type, $date, $line_items = NULL, $id);
	 	       array_push($orders, $new_order);
	 	   }
	 	   return $orders;
		}

		static function deleteAll()
		{
			 $GLOBALS['DB']->exec("DELETE FROM orders;");
		}

		static function find($search_id)
		{
			$found_order = null;
			$orders = Order::getAll();
			foreach($orders as $order){
				$order_id = $order->getId();
				if ($order_id == $search_id)
				{
					$found_order = $order;
				}
			} return $found_order;
		}

		function checkout()
		{

		}
		
		function getOrderDetails()
		{

		}

	}

 ?>
