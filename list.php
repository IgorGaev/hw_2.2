<?php
move_uploaded_file($_FILES['testfile']['tmp_name'],'tests.json');
$data = json_decode(file_get_contents(__DIR__.'/tests.json'), true);
print_r($data)
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Загруженные тесты</title>
</head>
<body>
<ol>
    <?php foreach ($data as $number => $test): ?>
    <li>
        <p><b>Сколько будет 3 + 2?</b> <br>
            <input type="radio" name="answer" value="a1"> Три
            <input type="radio" name="answer" value="a2"> Четыре
            <input type="radio" name="answer" value="a3"> Пять
        </p>
    </li>

</ol>

</body>
</html>
