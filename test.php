<?php
$data = json_decode(file_get_contents(__DIR__.'/tests.json'), true);
$selectNumber = $_GET['testNumber'];
$quest = $data[$selectNumber]['question'];
$answers = $data[$selectNumber]['answers'];
$correct_answer_num = (int)$data[$selectNumber]['correct_answer_num']
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Выберите правильный ответ</h3>
<form method="post">
    <p><b><?php echo $quest?></b> <br>
    <?php foreach ($answers as $answer_num => $answer) :?>
        <label>
            <input type="radio" name="answer" value="<?php echo $answer_num?>">
        </label> <?php echo $answer?>
    </p>
    <?php endforeach;?>
    <input type="submit" value="Выбрать">
<?php
if (!empty($_POST)) {
    $userAnswer_num = (int)++$_POST['answer'];
    if($correct_answer_num === $userAnswer_num) {
        echo '<b><p>Ответ правильный</p></b>';
    } else {
        echo '<b><p>Ответ неправильный</p></b>';
    }
}
?>
</body>
</html>