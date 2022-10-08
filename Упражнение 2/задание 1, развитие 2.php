<html>
<head>
    <title>Calc</title>
</head>
<body>

<form method="POST">
    <input type="text" name="a">
    <select name="op">
        <option value="add">+</option>
        <option value="sub">-</option>
        <option value="mul">*</option>
        <option value="div">/</option>
    </select>
    <input type="text" name="b">
    <button type="submit">Отправить</button>
</form>
<?php

    if (!empty($_POST))
    {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $op = $_POST['op'];

        // обработка операндов

        if (!is_numeric($a) or !is_numeric($b))
        {
            echo 'Операнд должен быть числом!';
            return Null;
        }

        switch ($op) {
            case 'add':
                echo "$a $op $b = " . ($a + $b);
                break;
            
            case 'sub':
                echo "$a $op $b = " . ($a - $b);
                break;

            case 'mul':
                echo "$a $op $b = " . ($a * $b);
                break;

            case 'div':
                // обработка операции
                if ($b != 0)
                {
                    echo "$a $op $b = " . ($a / $b);
                    break;
                }
                else
                {
                    echo 'Ошибка: на нуль делить нельзя!';
                    break;
                }

            default:
                echo 'Такой операции не существует!';
        }
    }

?>
</body>
</html>