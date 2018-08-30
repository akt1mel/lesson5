<?php

$testName = "tests/".$_GET['test'];
$test = json_decode(file_get_contents($testName), true);

$result = 0;

//после отправки формы подчситываем правильное количество ответов



?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Список тестов</title>
</head>
<body>
<h1>Тест</h1>


<form action="" method="POST">
    <?php foreach ($test as $key => $value) {
        echo "<fieldset id=''>";
            echo "<legend>".$value["question"]."</legend>";
            echo "<label><input type='radio' name='answer".$key."' value='0' required>".$value["answers"][0]."</label>";
            echo "<label><input type='radio' name='answer".$key."' value='1'>".$value["answers"][1]."</label>";
            echo "<label><input type='radio' name='answer".$key."' value='2'>".$value["answers"][2]."</label>";
            echo "<label><input type='radio' name='answer".$key."' value='3'>".$value["answers"][3]."</label>";
        echo "</fieldset>";
    } ?>
    <input type="submit" value="Отправить" name="submit">
</form>


<?php
    if (isset($_POST['submit'])) {
        foreach ($test as $key => $value) {
            if($value['correct_answer'] == $_POST['answer'.$key]) {
                $result++;
            }
        }
        echo "<h2>Всего верных ответов ".$result."</h2>";
    }

?>

<ul>
    <li><a href="admin.php">Загрузка теста</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>

</body>
</html>