<?php
if (!empty($_FILES)) {
    $json = "json";

    $fileName = $_FILES['testfile']['name'];
    $explode = explode(".", $fileName);

    if ($explode[1] !== $json) {
        echo 'Можно загружать только файлы с разрешением json.';
    } else {

        move_uploaded_file($_FILES['testfile']['tmp_name'], 'tests.json');

        header('Location: list.php');

        exit();
    }
}
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Тест</title>
    </head>
    <body>
        <h1>Загрузите файл с тестом</h1>
        <form enctype="multipart/form-data" method="post">
            <p><input name="testfile" type="file"></p>
            <input type="submit" value="Загрузить">
        </form>
    </body>
</html>