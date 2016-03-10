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
	//////////id
	    function getId()
	    {
	      return $this->id;
	    }
//////////name
    	function getName()
		{
			return $this->name;
		}

		function setName($name)
		{
			$this->name = $name;
		}
/////////description
	    function getDescription()
	    {
	      return $this->description;
	    }

	    function setDescription($description)
	    {
	      $this->description = $description;
	    }
///////////type_id
	    function getTypeId()
	    {
	      return $this->type_id;
	    }

	    function setTypeId($type_id)
	    {
	      $this->type_id = $type_id;
	    }
////////////gender
	    function getGender()
	    {
	      return $this->gender;
	    }

	    function setGender($gender)
	    {
	      $this->gender = $gender;
	    }
////////////price
	    function getPrice()
	    {
	      return $this->price;
	    }

	    function setPrice($price)
	    {
	      $this->price = $price;
	    }
//////////img
	    function getImg()
	    {
	      return $this->img;
	    }

	    function setImg($img)
	    {
	      $this->img = $img;
	    }
		function save()
		{
			$GLOBALS['DB']->exec(
	 	   	 "INSERT INTO products
	 	   	 (gender, type_id, name, description, price, img)
	 	   	 VALUES
				('{$this->getGender()}',
				{$this->getTypeId()},
				'{$this->getName()}',
				'{$this->getDescription()}',
				'{$this->getPrice()}',
				'{$this->getImg()}'
				)"
			);
	 	   	$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$returned_products = $GLOBALS['DB']->query("SELECT * FROM products;");
	 	   $products = array();
	 	   foreach($returned_products as $product) {
			   $gender = $product['gender'];
			   $type_id = $product['type_id'];
	 	       $name = $product['name'];
	 	       $description = $product['description'];
			   $price = $product['price'];
	           $img = $product['img'];
			   $id = $product['id'];
			   $new_product = new Product($gender, $type_id, $name, $description, $price, $img, $id);
	 	       array_push($products, $new_product);
	 	   }
	 	   return $products;
		}
