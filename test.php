<?php
$data = json_decode(file_get_contents(__DIR__ . '/tests.json'), true);
if (!empty($_POST)) {
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    if ($q1 == '' or $q2 == '' or $q3 == '') {
        echo '<p>Вы не ответили на все вопросы. <a href="list.php">Назад</a></p>';
        exit();
    } else {
        foreach ($data as $test) {
            $correctAnswerNum1 = $test['question1']['correctAnswerNum'];
            $correctAnswerNum2 = $test['question2']['correctAnswerNum'];
            $correctAnswerNum3 = $test['question3']['correctAnswerNum'];
        }
        $score = 0;
        if ($q1 == $correctAnswerNum1)
            $score++;
        if ($q2 == $correctAnswerNum2)
            $score++;
        if ($q3 == $correctAnswerNum3)
            $score++;
        echo 'Количество правильных ответов: <b>' . $score . '</b>'
        . '<p><a href="list.php">Выбор теста</a></p>';
        exit();
    }
}

if (array_key_exists('selectNumberTest', $_GET)) {
    $filter = FILTER_VALIDATE_INT; # задаем параметры фильтра
    $options = ['options' => ['min_range' => 1, 'max_range' => 4]];
    $validate = filter_input(INPUT_GET, 'selectNumberTest', $filter, $options);
    if (!$validate) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404 Not Found';
        exit();
    } else {
        $selectNumberTest = (int) $_GET['selectNumberTest'];
        foreach ($data as $NumberTest => $test) {
            ++$NumberTest;
            if ($selectNumberTest === $NumberTest) {
                $quest1 = $test['question1']['question'];
                $quest2 = $test['question2']['question'];
                $quest3 = $test['question3']['question'];
                $answers1 = $test['question1']['answers'];
                $answers2 = $test['question2']['answers'];
                $answers3 = $test['question3']['answers'];
            }
        }
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Выберите правильный ответ:</h3>
        <form  method="POST">
            <fieldset>
                <legend><?= $quest1 ?></legend>
                <label><input name="q1" type="radio" value="1"><?= $answers1['0'] ?></label>
                <label><input name="q1" type="radio" value="2"><?= $answers1['1'] ?></label>
                <label><input name="q1" type="radio" value="3"><?= $answers1['2'] ?></label>
                <label><input name="q1" type="radio" value="4"><?= $answers1['3'] ?></label>
            </fieldset>
            <fieldset>
                <legend><?= $quest2 ?></legend>
                <label><input name="q2" type="radio" value="1"><?= $answers2['0'] ?></label>
                <label><input name="q2" type="radio" value="2"><?= $answers2['1'] ?></label>
                <label><input name="q2" type="radio" value="3"><?= $answers2['2'] ?></label>
                <label><input name="q2" type="radio" value="4"><?= $answers2['3'] ?></label>
            </fieldset>
            <fieldset>
                <legend><?= $quest3 ?></legend>
                <label><input name="q3" type="radio" value="1"><?= $answers3['0'] ?></label>
                <label><input name="q3" type="radio" value="2"><?= $answers3['1'] ?></label>
                <label><input name="q3" type="radio" value="3"><?= $answers3['2'] ?></label>
                <label><input name="q3" type="radio" value="4"><?= $answers3['3'] ?></label>
            </fieldset>
            <input type="submit" value="Отправить">
        </form>                    
    </form>       
</body>
</html>  
