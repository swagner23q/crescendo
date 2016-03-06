<?php

	require_once 'src/Class.php';

	class ClassTest extends PHPUnit_Framework_TestCase
	{

		function test_makeTitleCase_oneWord()
		{
		//Arrange
		$test_TitleCaseGenerator = new TitleCaseGenerator;
		$input = beowulf;

		//Act
		$result = $test_TitleCaseGenerator->makeTitleCase($input);

		//Assert
		$this->assertEquals('Beowulf', $result);
		}
	}

?>
