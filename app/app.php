<?php

	require_once __DIR__.'/../vendor/autoload.php';

	include ("../db/db_connection.php");

	include ("config.php");

	include ("routes.php");

	return $app;

?>
