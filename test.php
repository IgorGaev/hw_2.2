<?php
if (!empty($_GET)) {
    if (array_key_exists('testNumber', $_GET)) {
        $data = json_decode(file_get_contents(__DIR__ . '/tests.json'), true);
        $filter = FILTER_VALIDATE_INT; # задаем параметры фильтра
        $options = [
            'options' => [
                'min_range' => 1,
                'max_range' => 4
            ]
        ];
        $validate = filter_input(INPUT_GET, 'testNumber', $filter, $options);
        echo $validate;
    }
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if($validate) {
    $selectNumber = $_GET['testNumber'];
    $quest = $data[$selectNumber]['question'];
    $answers = $data[$selectNumber]['answers'];
    $correct_answer_num = (int)$data[$selectNumber]['correct_answer_num'];
    echo '<h3>Выберите правильный ответ</h3>';
    echo '<form method="post">';
    echo "<p><b>$quest</b></p>";
    foreach ($answers as $answer_num => $answer) :
    echo '<label>';
    echo "<input type='radio' name='answer' value='".$answer_num."'>$answer";
    echo '</label>';
    endforeach;
    echo '<input type="submit" value="Выбрать">';
} else {
    echo 'Bad';
}?>

</body>
</html>