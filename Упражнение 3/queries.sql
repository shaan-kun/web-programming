-- содержимое счёта
CREATE TABLE IF NOT EXISTS BillContent(
	bill_content_id INT PRIMARY KEY AUTO_INCREMENT,
	goods_name VARCHAR(255),
	price DECIMAL(10, 2),
	quantity DECIMAL(10, 2)
);

INSERT INTO
	BillContent(goods_name, price, quantity)
VALUES
	('картофель', 23.49, 20),
	('картофель', 23.49, 49.5),
	('лук', 19.89, 17.13),
	('картофель', 23.49, 2.28),
	('лук', 19.89, 33),
	('картофель', 23.49, 335),
	('яблоки', 49.89, 3.5),
	('апельсины', 89.89, 5),
	('ананасы', 119.99, 2.5),
	('апельсины', 89.89, 2.28);




-- счета
CREATE TABLE IF NOT EXISTS Bill(
	bill_id INT PRIMARY KEY AUTO_INCREMENT,
	bill_date DATE,
	name VARCHAR(255)
);

INSERT INTO
	Bill(bill_date, name)
VALUES
	('2022-10-01', 'Норникель'),
	('2022-10-02', 'Логстрим'),
	(NOW(), 'Норникель');

ALTER TABLE BillContent ADD bill_id INT;
ALTER TABLE BillContent ADD FOREIGN KEY (bill_id) REFERENCES Bill (bill_id) ON DELETE CASCADE;

UPDATE BillContent SET bill_id = 1 WHERE bill_content_id = 1;
UPDATE BillContent SET bill_id = 2 WHERE bill_content_id = 2;
UPDATE BillContent SET bill_id = 1 WHERE bill_content_id = 3;
UPDATE BillContent SET bill_id = 1 WHERE bill_content_id = 4;
UPDATE BillContent SET bill_id = 2 WHERE bill_content_id = 5;
UPDATE BillContent SET bill_id = 3 WHERE bill_content_id = 6;
UPDATE BillContent SET bill_id = 1 WHERE bill_content_id = 7;
UPDATE BillContent SET bill_id = 2 WHERE bill_content_id = 8;
UPDATE BillContent SET bill_id = 3 WHERE bill_content_id = 9;
UPDATE BillContent SET bill_id = 3 WHERE bill_content_id = 10;




-- оплата по счетам
CREATE TABLE IF NOT EXISTS Payment (
	payment_id INT PRIMARY KEY AUTO_INCREMENT,
	bill_id INT,
	payment_date DATE,
	charge DECIMAL(10, 2),
	FOREIGN KEY (bill_id) REFERENCES Bill (bill_id) ON DELETE CASCADE
);

INSERT INTO
	Payment(bill_id, payment_date, charge)
VALUES
	(1, '2022-10-01', 400),
	(1, '2022-10-02', 400),
	(1, '2022-10-10', 250),
	(2, '2022-10-01', 1000),
	(2, '2022-10-02', 1000);




-- запросы к БД

-- стоимость купленных товаров по позициям
SELECT
	goods_name, price, quantity, price * quantity AS charge
FROM BillContent;

-- стоимость купленных товаров
SELECT
	goods_name, SUM(price * quantity) AS total
FROM BillContent
GROUP BY goods_name
ORDER BY goods_name;

-- покупки по счетам
SELECT
	bill_id, bill_date, name, SUM(price * quantity) AS total
FROM Bill
JOIN BillContent USING (bill_id)
GROUP BY bill_id;

-- задолженность
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
ORDER BY bill_id;