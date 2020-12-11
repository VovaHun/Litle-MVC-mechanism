<!--Таблица -->
<table class="table table-bordered">
    <thead class="thead-inverse">
    <tr>
        <th scope="col" class="thname">Имя пользователя</th>
        <th scope="col" class="thname">e-mail</th>
        <th scope="col" class="thname">Задача</th>
        <th scope="col" class="thname">Выполнено</th>
        <th scope="col" class="thname">Изменить</th>
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

    // Определение страницы
    $sort = $_GET['sort'];
    $ord = $_GET['ord'];

    // Получение количества страниц
    $str_pag = ceil($rows / 3);



    //Определение с какой записи выводить
    $art = ($page * $kol) - $kol;
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
        echo '<form method="post" action=""> ';
        echo '<input name="id" type="hidden" value="'.$row->id.'">';
        echo '<td class="usname" >'.$row->nameUser.'</td>';
        echo '<td class="em">'.$row->email.'</td>';
        echo '<td class="tas"><textarea type="text" class="form-control areastyle" name="task">'.$row->task.' </textarea></td>';
        if($row->completed == 1){
            echo '<td>
        <div class="form-check form-check-inline">
          
            <input class="form-check-input" type="radio" name="check" id="exampleRadios1" value="1"  checked>
            <label class="form-check-label" for="exampleRadios1">Да </label> 
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="check" id="exampleRadios2" value="0">
            <label class="form-check-label" for="exampleRadios2">Нет</label> 
        </div> 
        </td>';
        }
        else{
            echo '<td>
        <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="check" id="exampleRadios1" value="1"  >
            <label class="form-check-label" for="exampleRadios1">Да </label> 
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="check" id="exampleRadios2" value="0" checked>
            <label class="form-check-label" for="exampleRadios2">Нет</label> 
        </div>
        </td>';
        }

        echo '<td><button type="submit" class="btn btn-primary mb-2">Принять</button> </td>';
        echo '</form>';
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