<?php

	 class Order
		{

		private $user_id;
		private $ship_type;
		private $date;
		private $id;

		function __construct($user_id, $ship_type, $date, $id = NULL)
		{
			$this->user_id = $user_id;
			$this->ship_type = $ship_type;
			$this->date = $date;
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

		function getid()
		{
			return $this->id;
		}

		function save()
		{

		}

		static function getAll()
		{

		}

		static function deleteAll()
		{

		}
	}

 ?>
