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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $number ?></title>
</head>
<body>
	<table height="50%" width="50%" border="2" cellpadding="5" cellspacing="5">
		<tr height="250px">
			<td align="center">
				<h1>Это страница №<?= $number ?></h2>
			</td>
		</tr>
		<tr height="50px">
			<td align="center">
			<?php

				if ($number > 9)
					echo '<a href="?number=' . ((int) ($number / 10) * 10 - 1) . '"><<<</a>';

				for ($i = (int) ($number / 10) * 10; $i < (int) ($number / 10 + 1) * 10; $i++) {
					if ($i == 0) continue;

					if ($i == $number)
						echo ' ' . ($i) . ' ';
					else
						echo ' <a href="?number=' . $i . '">' . $i . '</a> ';
				}

				echo '<a href="?number=' . ((int) ($number / 10 + 1) * 10) . '">>>></a>';

			?>
			</td>
		</tr>
	</table>
</body>
</html>