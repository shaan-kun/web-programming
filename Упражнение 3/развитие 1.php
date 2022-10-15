<?php

	require_once 'connect.php';

	$query = "
		SELECT
			goods_name, SUM(price * quantity) AS total
		FROM BillContent
		GROUP BY goods_name
		ORDER BY goods_name
	";

	$goods = mysqli_query($connect, $query);
	$goods = mysqli_fetch_all($goods, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Товары</title>
	<style>
		table {
			width: 50%;
			border: none;
			margin-bottom: 20px;
		}

		table thead th {
			font-weight: bold;
			text-align: left;
			border: none;
			padding: 10px 15px;
			background: #d8d8d8;
			font-size: 14px;
		}

		table thead tr th:first-child {
			border-radius: 8px 0 0 8px;
		}

		table thead tr th:last-child {
			border-radius: 0 8px 8px 0;
		}

		table tbody td {
			text-align: left;
			border: none;
			padding: 10px 15px;
			font-size: 14px;
			vertical-align: top;
		}

		table tbody tr:nth-child(even){
			background: #f3f3f3;
		}

		table tbody tr td:first-child {
			border-radius: 8px 0 0 8px;
		}

		table tbody tr td:last-child {
			border-radius: 0 8px 8px 0;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
			<th>Название товара</th>
			<th>Общая сумма</th>
		</tr>
		</thead>
        <tbody>
    		<?php
    			foreach ($goods as $item) {
    				echo '<tr>';
    				echo '<td>' . $item['goods_name'] . '</td>';
    				echo '<td>' . $item['total'] . '</td>';
    				echo '</tr>';
    			}
    		?>
        </tbody>
	</table>
</body>
</html>