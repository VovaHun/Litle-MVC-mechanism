<?php

require_once "vendor/autoload.php"; //автозагрузчик классов
require_once "vendor/main.php"; //основной класс приложения

class Admin{

    public function login ($login,$password){

        $log = new PDO('mysql:host=localhost;dbname=testwork;charset=utf8', 'root', '');
        $query = 'SELECT login, password FROM admins';
        $sql = $log->query($query);
        $row = $sql->fetch(PDO::FETCH_OBJ);

        $adminlog =  $row->login;
        $adminpas =  $row->password;

        if($login == $adminlog && $password == $adminpas) {
            $_SESSION['login'] = $login;
        }

    }

}