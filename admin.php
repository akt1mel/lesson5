<?php

$uploadsDir = 'tests/';
$uploadFile = $uploadsDir.basename($_FILES['test']['name']);


if (!empty($_FILES)) {
    if (move_uploaded_file($_FILES['test']['tmp_name'], $uploadsDir. $_FILES["test"]['name'])) {
        $uploadResult = "Файл успешно загружен в папку tests.";
    } else {
        $uploadResult = "Не удалось загрузить файл";
    }
}

?>





<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<h1>Загрузка теста</h1>

<form enctype="multipart/form-data" method="POST">
    <p><input type="file" name="test"></p>
    <input type="submit" value="Отправить">
</form>

<?php
if (isset($_POST)) {
    echo "<p>".$uploadResult."</p>";
}
?>

<ul>
    <li><a href="admin.php">Загрузка теста</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>
</body>
</html>
