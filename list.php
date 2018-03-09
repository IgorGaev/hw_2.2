<?php
move_uploaded_file($_FILES['testfile']['tmp_name'],'tests.json');
$data = json_decode(file_get_contents(__DIR__.'/tests.json'), true);
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
<h2>Выберите тест</h2>
<form action="test.php" method="get">
  <ol>
    <?php foreach ($data as $number => $test): ?>
    <li>
        <input type="radio" name="testNumber" value="<?php echo $number?>">
        Тест № <?php echo $number?>
     </li>
    <?php endforeach?>
  </ol>
    <input type="submit" value="Выбрать">
</form>
</body>
</html>
