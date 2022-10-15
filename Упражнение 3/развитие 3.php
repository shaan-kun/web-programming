<?php

	require_once 'connect.php';

	$query = "
		SELECT
			bill_id, bill_date, name, IF(total_charge >= total_debt, 0, total_debt - total_charge) AS debt
		FROM (
			SELECT
				bill_id, bill_date, name, SUM(IF(charge IS Null, 0, charge)) AS total_charge
			FROM Bill
			LEFT JOIN Payment USING (bill_id)
			GROUP BY bill_id
		) AS charge_table
		LEFT JOIN (
			SELECT
				bill_id, SUM(IF(price IS NULL, 0, price * quantity)) AS total_debt
			FROM Bill
			LEFT JOIN BillContent USING (bill_id)
			GROUP BY bill_id
		) AS debt_table USING (bill_id)
		GROUP BY bill_id
		ORDER BY bill_id
	";

	$debts = mysqli_query($connect, $query);
	$debts = mysqli_fetch_all($debts, MYSQLI_ASSOC);

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
			<th>Номер счёта</th>
			<th>Дата</th>
			<th>Организация</th>
			<th>Сумма задолженности</th>
		</tr>
		</thead>
        <tbody>
    		<?php
    			foreach ($debts as $item) {
    				echo '<tr>';
    				echo '<td>' . $item['bill_id'] . '</td>';
    				echo '<td>' . $item['bill_date'] . '</td>';
    				echo '<td>' . $item['name'] . '</td>';
    				echo '<td>' . $item['debt'] . '</td>';
    				echo '</tr>';
    			}
    		?>
        </tbody>
	</table>
</body>
</html>