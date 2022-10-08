<?php

$a = $_GET['a'];
$b = $_GET['b'];
$op = $_GET['op'];

switch ($op) {
	case 'add':
		echo "$a $op $b = " . ($a + $b);
		break;
	
	case 'sub':
		echo "$a $op $b = " . ($a - $b);
		break;

	case 'mul':
		echo "$a $op $b = " . ($a * $b);
		break;

	case 'div':
		echo "$a $op $b = " . ($a / $b);
		break;
}
