<?php
$data = json_decode(file_get_contents(__DIR__.'/tests.json'), true);
$selectNumber = $_GET['testNumber'];
$quest = $data[$selectNumber]['quest'];
$answer1 = $data[$selectNumber]['answ1'];
$answer2 = $data[$selectNumber]['answ2'];
$answer3 = $data[$selectNumber]['answ3'];
$correctAnswer = $data[$selectNumber]['answX'];
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
<h3>Выберете правильный ответ</h3>
<form method="post">
    <p><b><?php echo $quest?></b> <br>
        <label>
            <input type="radio" name="answer" value="<?php echo $answer1?>">
        </label> <?php echo $answer1?>
        <label>
            <input type="radio" name="answer" value="<?php echo $answer2?>">
        </label> <?php echo $answer2?>
        <label>
            <input type="radio" name="answer" value="<?php echo $answer3?>">
        </label> <?php echo $answer3?>
    </p>
    <input type="submit" value="Выбрать">
<?php
if (!empty($_POST)) {
    $userAnswer = $_POST['answer'];
    if($userAnswer !== $correctAnswer) {
        echo '<b><p>Ответ неправильный</p></b>';
    } else {
        echo '<b><p>Ответ правильный</p></b>';
    }
}
?>
</body>
</html>