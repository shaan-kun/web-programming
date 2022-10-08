<?php

$a = $_GET['a'];
$b = $_GET['b'];
$op = $_GET['op'];

// обработка операндов

if (!is_numeric($a) or !is_numeric($b))
{
	print 'Операнд должен быть числом!';
	return Null;
}

switch ($op) {
	case 'add':
		echo "$a $op $b = " . ($a + $b);
		break;
	
	case 'sub':
		print "$a $op $b = " . ($a - $b);
		break;

	case 'mul':
		print "$a $op $b = " . ($a * $b);
		break;

	case 'div':
		// обработка операции
		if ($b != 0)
		{
			print "$a $op $b = " . ($a / $b);
			break;
		}
		else
		{
			print 'Ошибка: на нуль делить нельзя!';
			break;
		}

	default:
		print 'Такой операции не существует!';
}
