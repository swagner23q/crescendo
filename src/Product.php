<?php

	 class Product
	 {

		private $gender;
		private $type_id;
		private $name;
		private $description;
    	private $img_path;
		private $id;

	    function __construct($gender, $type_id, $name, $description, $img_path, $id = NULL)
	    {
			$this->gender = $gender;
			$this->type_id = $type_id;
			$this->name = $name;
			$this->description = $description;
      		$this->img_path = $img_path;
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
//////////img_path
	    function getImgPath()
	    {
	      return $this->img_path;
	    }

	    function setImgPath($img_path)
	    {
	      $this->img_path = $img_path;
	    }

		function save()
		{
			$GLOBALS['DB']->exec(
	 	   	 "INSERT INTO products
	 	   	 (gender, type_id, name, description, img)
	 	   	 VALUES
				('{$this->getGender()}',
				{$this->getTypeId()},
				'{$this->getName()}',
				'{$this->getDescription()}',
				'{$this->getImgPath()}'
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
	           $img_path = $product['img'];
			   $id = $product['id'];
			   $new_product = new Product($gender, $type_id, $name, $description, $img_path, $id);
	 	       array_push($products, $new_product);
	 	   }
	 	   return $products;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM products;");
		}

		// static function find($search_id)
        // {
        //     $found_product = null;
        //     $all_products = Product::getAll();
        //     foreach($all_products as $product) {
        //         if ($search_id == $product->getId()){
        //             $found_product = $product;
        //         }
        //     }
        //     return $found_product;
        // }
	}

?>
