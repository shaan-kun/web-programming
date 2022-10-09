<?php
	
	$number = isset($_GET['number']) ? $_GET['number'] : 0;
	echo '<a href="?number=' . ($number + 1) . '">' . $number . '</a>';
