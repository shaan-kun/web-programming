<?php
	
	$number = 0;

	if (isset($_GET['number']))
	{
		$number = (int) $_GET['number'];

		if ($number < 0)
		{
			echo 'Параметр должен быть натуральным числом или нулём!';
			return;
		}
	}

	if ($number > 0)
	{
		echo '<a href="?number=' . ($number - 1) . '"><<<</a>';
	}

	for ($i = 1; $i <= 10; $i++)
	{
		echo ' ' . ($number * 10 + $i) . ' ';
	}

	echo '<a href="?number=' . ($number + 1) . '">>>></a>';
