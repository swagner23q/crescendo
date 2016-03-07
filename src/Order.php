<?php
	 class Order
		{
		private $line_item;
		private $id;

		function __construct($line_item, $id = NULL)
		{
			$this->line_item = $line_item;
			$this->id = $id;
		}

	}
 ?>
