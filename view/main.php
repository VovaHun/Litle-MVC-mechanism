

<!DOCTYPE html>
<html>
<?php include 'head.php' ?>
<body>
<?php include 'header.php' ?>
<div class="content">
    <?php
    $homecon = new HomeController();
    $mastask = $_POST;
    $homecon->addtask($mastask);

    $admin = new AdminController();
    $massiv = $_POST;
    $admin->update($massiv);

    ?>

<div class="sort">
    <?php
    // Определение страницы
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else $page = 1
    ?>
    <table class="table table-bordered table-sm ">
        <tr>
            <td>Имя</td>
            <td><a href="/index/?page=<?=$page?>&sort=nameUser&ord=up"> &#9650;</a></td>
            <td><a href="/index/?page=<?=$page?>&sort=nameUser&ord=down">&#9660;</a></td>
        </tr>
        <tr>
            <td>Почта</td>
            <td><a href="/index/?page=<?=$page?>&sort=email&ord=up">&#9650;</a></td>
            <td><a href="/index/?page=<?=$page?>&sort=email&ord=down">&#9660;</a></td>
        </tr>
        <tr>
            <td>Выполненость</td>
            <td><a href="/index/?page=<?=$page?>&sort=completed&ord=up">&#9650;</a></td>
            <td><a href="/index/?page=<?=$page?>&sort=completed&ord=down">&#9660;</a></td>
        </tr>
        <tr>
            <td><a href="/index/?page=<?=$page?>">Отменить</a></td>
        </tr>
    </table>

</div>
<div class="task">
    <?php if(!empty($_SESSION['login'])) {
        include 'table_admin.php';
    }
    else{
        include 'table.php';
    }
    ?>
</div>
<hr>
<div class="formin" >
    <!--Форма ввода -->
    <form method="POST" action="" >
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Имя пользователя </label>
                <input type="text" name="userName" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Электронная почта</label>
                <input type="email"  name="email"  class="form-control"required>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Задача</label>
            <textarea name="task" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-centr">Отправить</button>
    </form>

</div>

</div>


</body>
</html>