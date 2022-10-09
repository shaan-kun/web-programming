<?php
	
	$number = 0;

	if (isset($_GET['number']))
	{
		$number = (int) $_GET['number'];

		if ($number < 1)
		{
			echo 'Параметр должен быть натуральным числом!';
			return;
		}
	}

	echo '<a href="?number=' . ($number + 1) . '">' . $number . '</a>';
