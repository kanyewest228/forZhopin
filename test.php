<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        table, th, tr, td {
            border: 1px solid black;

        }
    </style>
</head>
<body>
<div class="container d-flex flex-column align-items-center gap-5">

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$mysqli = mysqli_connect(
    "localhost",
    "hyhvkrjk",
    "VVAuiY",
    "hyhvkrjk_m3"
);
if (mysqli_connect_errno()) {
    echo "Error: " . mysqli_connect_error();
    return;
}
if(!empty($_GET)) {
    if($_GET['delete'] && $_GET['id']) {
        $query = "DELETE FROM user WHERE `user`.id = ".$_GET['id'];
        mysqli_query($mysqli, $query);
        if(mysqli_affected_rows($mysqli) == 1) {
            echo "Запись удалена";
        } else {
            echo "Ошибка удаления";
        }
    }
}
if(!empty($_POST)) {
    $errors = [];
    if (empty($_POST['login'])) {
        $errors['login'] = 'Login is required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'password is required';
    }
    if (empty($errors)) {
        $userLogin = $_POST['login'];
        $userPassword = $_POST['password'];
        $query = "INSERT INTO user (login, password) VALUES ('$userLogin', md5('$userPassword'))";
        $res = mysqli_query($mysqli, $query);
        if ($res) echo "Зареган";
        else echo "Что-то не так!";
    }
}
?>

<form name="form" method="post" class="d-flex flex-column w-25 gap-2">
    <input type="text" name="login" class="form-control" placeholder="Логин">
    <input type="text" name="password" class="form-control" placeholder="Пароль">
    <input type="submit" class="btn btn-success">
</form>
<table>
    <caption>Пользователи</caption>
    <tr><th>№</th><th>login</th><th>password</th></tr>
    <?php
    $query = "SELECT * FROM user";
    $res = mysqli_query($mysqli, $query);
    $arr = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo "<tr>";
    foreach ($arr as $item) {
        echo "<tr>";
        echo "<td>" . $item["id"] . "</td>";
        echo "<td>" . $item["login"] . "</td>";
        echo "<td>" . $item["password"] . "</td>";
        echo "<td><a href='?delete=true&id=$item[id]' class='btn btn-danger'>Удалить</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</div>
</body>
</html>