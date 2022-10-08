<?php

$n_min = 3;
$m_min = 2;

$n_max = 10;
$m_max = 19;

// генерация ассоциативного массива p

$p = [];

for ($i = $n_min; $i < $n_max; $i++)
	$p[$i] = [];

for ($i = $n_min; $i <= $n_max; $i++)
	for ($j = $m_min; $j <= $m_max; $j++)
		$p[$i][$j] = rand(1, 10);

// вывод таблицы

echo '<table border="1" cellpadding="2" cellspacing="2">';

for ($i = $n_min; $i <= $n_max; $i++) {
	echo '<tr>';
	
	for ($j = $m_min; $j <= $m_max; $j++)
		echo '<td>' . pow($i * $j, $p[$i][$j] ) . '</td>';
	
	echo '</tr>';
}

echo '</table>';
