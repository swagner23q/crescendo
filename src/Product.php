<?php

	 class Product
		{

		private $name;
		private $description;
		private $type_id;
		private $gender;
    private $img_path;
		private $id;

    function __construct($name, $description, $type_id = NULL, $gender, $img_path, $id = NULL)
    {
			$this->name = $name;
			$this->description = $description;
			$this->type_id = $type_id;
			$this->gender = $gender;
      $this->img_path = $img_path;
			$this->id = $id;
    }

		function save()
		{
			$GLOBALS['DB']->exec(
	 	   	 "INSERT INTO products
	 	   	 (name, description, type_id, gender, img)
	 	   	 VALUES
		 	   ('{$this->getName()}',
				 '{$this->getDescription()}',
				 {$this->getTypeId()},
				 '{$this->getGender()}',
				 '{$this->getImgPath()}')");
	 	   	$this->id = $GLOBALS['DB']->lastInsertId();
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

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM products;");
		}

    static function getAll()
		{
			$returned_products = $GLOBALS['DB']->query("SELECT * FROM products;");
	 	   $products = array();
	 	   foreach($returned_products as $product) {
	 	       $id = $product['id'];
	 	       $name = $product['name'];
	 	       $description = $product['description'];
	 	       $type_id = $product['type_id'];
           $gender = $product['gender'];
           $img_path = $product['img_path'];
			   $new_product = new Product($id = NULL, $name, $description, $type_id = NULL, $gender, $img_path);
	 	       array_push($products, $new_product);
	 	   }
	 	   return $products;
		}

    static function find($search_id)
            {
                $found_product = null;
                $all_products = Product::getAll();
                foreach($all_products as $product) {
                    if ($search_id == $product->getId()){
                        $found_product = $product;
                    }
                }
                return $found_product;
            }
			}

?>
