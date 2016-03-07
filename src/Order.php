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

		function getLineItem()
		{
			return $this->line_item;
		}

		function setLineItem($line_item)
		{
			$this->line_item = $line_item;
		}

		function getid()
		{
			return $this->id;
		}
	}
 ?>
