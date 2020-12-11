
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/index/">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/index/">Задачи</a>
                </li>
                <?php if(!empty($_SESSION['login'])) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="/out/">Выход</a>
                    </li>
                <?php }  else {?>
                <li class="nav-item active">
                    <a class="nav-link" href="/admin/">Войти в админку</a>
                </li>
                <?php } ?>
            </ul>
            <?php
            if(!empty($_SESSION['login'])) {
                 echo '<span class="navbar-text">  Добро пожаловать, '. $_SESSION['login'].'</span>';}
            else {
                echo '<span class="navbar-text">  Добро пожаловать, User </span>';
                }
            ?>
        </div>
    </nav>
</header>