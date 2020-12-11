<?php

require_once "vendor/autoload.php"; //автозагрузчик классов
require_once "vendor/main.php"; //основной класс приложения

class Task
{
    public function select($table, $rows = '*', $where = null, $order = null, $limit= null){
        $con = new PDO('mysql:host=localhost;dbname=testwork;charset=utf8', 'root', '');

        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;
        if($limit != null)
            $q .= ' LIMIT '.$limit;

        $sql = $con->query($q);
        
        return $sql;
    }
    public function add($table,$userName,$email,$task){
        $con = new PDO('mysql:host=localhost;dbname=testwork;charset=utf8', 'root', '');
        $query = 'INSERT INTO '.$table.' (nameUser,email,task,completed) VALUES (:nameUser, :email,:task,:completed)';
        $params = [
            ':nameUser' => $userName,
            ':email' => $email,
            ':task' => $task,
            ':completed'=> 0
        ];

        $add = $con->prepare($query);
        $add->execute($params);
    }

    public function update($table,$id,$task,$completed){
        $log = new PDO('mysql:host=localhost;dbname=testwork;charset=utf8', 'root', '');
        $query = 'UPDATE tasks SET task=:task, completed=:completed WHERE id=:id';
        $params = [
            ':task' => $task,
            ':completed' => $completed,
            ':id' => $id
        ];
        $update = $log->prepare($query);
        $update->execute($params);

        $up = $update->rowCount();
        if($up>0){
            echo '<script> showMessage(1) </script>';
        }

    }






}