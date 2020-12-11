<!--Таблица -->
<table class="table table-bordered">
    <thead class="thead-inverse">
    <tr>
        <th scope="col" class="thname">Имя пользователя</th>
        <th scope="col" class="thname">e-mail</th>
        <th scope="col" class="thname">Задача</th>
        <th scope="col" class="thname">Выполнена</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //просто вывод всего
    $homecon = new HomeController();

    $sql = $homecon ->index();
    $rows = $sql->rowCount();

    //Код пагинации
    $kol = 3; //количество записей для вывода
    // Получение количества страниц
    $str_pag = ceil($rows / 3);
    //Определение с какой записи выводить
    $art = ($page * $kol) - $kol;

    $sort = $_GET['sort'];
    $ord = $_GET['ord'];

    if(empty($sort)){
        $paginat =  $homecon->viewtask($art);
    }
    else{
        $paginat = $homecon->sort($art,$sort,$ord);
    }

    $pag = $paginat->rowCount();

    // Вывод через while
    while ($row = $paginat->fetch(PDO::FETCH_OBJ)){
        echo '<tr>';
        echo '<td class="usname" >'.$row->nameUser.'</td>';
        echo '<td class="em">'.$row->email.'</td>';
        echo '<td class="tas">'.$row->task.'</td>';
        if($row->completed == 0){
            echo '<td class="check" align="center" valign="midle">&#9997;</td>';
        }
        else{
            echo '<td class="check" align="center" valign="midle">&#128123;</td>';
        }
        echo '</tr>';
    }

    ?>
    </tbody>
</table>
    <!--Пагинация -->
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $str_pag; $i++){
                echo '<li class="page-item">';
                if($sort == null){
                    echo "<a class=\"page-link\" href=/index/?page=".$i.">".$i." </a>";
                }
                else{
                    echo "<a class=\"page-link\" href=/index/?page=".$i."&sort=".$sort."&ord=".$ord.">".$i." </a>";
                }
                echo '</li>';
            }
            ?>
        </ul>
    </nav>
</div>