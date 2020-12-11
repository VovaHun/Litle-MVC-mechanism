<?php



class AdminController {

    public function admin()
    {
        require_once 'view/admin.php';
    }

    public function login($massiv)
    {
        $admin = new Admin();
        $login = $massiv['login'];
        $password = $massiv['password'];

        $error = $admin->login($login,$password);
        return $error;
    }
    public function out(){
        $_SESSION['login'] = null;
        header('Location: /index/');
    }
    public function update($massiv){
        $update = new Task();
        $id = $massiv['id'];
        $task = $massiv['task'];
        $check = $massiv['check'];
        if(!empty($_SESSION['login'])){
            $update->update('tasks',$id,$task,$check);
        }


    }

}