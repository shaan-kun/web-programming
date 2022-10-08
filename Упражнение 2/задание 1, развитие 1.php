<?php

$a = $_GET['a'];
$b = $_GET['b'];
$op = $_GET['op'];

// обработка операндов

if (!is_numeric($a) or !is_numeric($b))
{
	echo 'Операнд должен быть числом!';
	return Null;
}

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
		// обработка операции
		if ($b != 0)
		{
			echo "$a $op $b = " . ($a / $b);
			break;
		}
		else
		{
			echo 'Ошибка: на нуль делить нельзя!';
			break;
		}

	default:
		echo 'Такой операции не существует!';
}
