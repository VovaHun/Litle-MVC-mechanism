<?php
$login = new AdminController();
$massiv = $_POST;
$login->login($massiv);

?>
<!DOCTYPE html>
<html>
<?php include 'head.php' ?>
<body>
<?php include 'header.php' ?>

<?php  if(empty($_SESSION['login'])) {  ?>
<div class="wrapper">
    <div class="login" id="login">
        <form method="POST" action="" id="adminform">
            <div class="form-group">
                <label for="exampleInputEmail1">Логин админа</label>
                <input class="form-control" type="text" placeholder="Логин" name="login" id="login" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" id="btn">Войти</button>
        </form>
    </div>
</div>
<?php

    }
    else {
        echo '<div class="wrapper">Добро пожаловать, сэр Админ </div>';
    }
?>
</body>
</html>