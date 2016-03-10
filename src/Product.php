<?php

	 class Product
	 {

		private $gender;
		private $type_id;
		private $name;
		private $description;
		private $price;
        private $img;
		private $id;

	    function __construct($gender, $type_id, $name, $description, $price, $img, $id = NULL)
	    {
			$this->gender = $gender;
			$this->type_id = $type_id;
			$this->name = $name;
			$this->description = $description;
			$this->price = $price;
      		$this->img = $img;
			$this->id = $id;
	    }
