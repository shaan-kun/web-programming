<?php

// числа из отрезка [1, m]
$m = 150;

// по p чисел в строке
$p = 7;

// закрасить красным ячейки, кратные c
$c = 11;

echo '<table border="1" cellpadding="2" cellspacing="2">';

for ($i = 0; $i < ceil($m / $p); $i++) {
	echo '<tr>';
	
	for ($j = 0; $j < $p; $j++) {
		$num = $i * $p + $j + 1;
		
		if ($num > $m) {
			echo '<td colspan="' . (int) ($p - $j) . '"></td>';
			break;
		}
		
		if ($num % $c == 0)
			echo '<td bgcolor="red">' . $num . '</td>';
		else
			echo '<td>' . $num . '</td>';
		
	}
	
	echo '</tr>';
}

echo '</table>';
