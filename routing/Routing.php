<?php

class Routing
{
    public function url($method, $url ,$controller) {

        $array = explode('@',$controller);

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $controller = $array[0];
        $action = $array[1];


        if (empty($routes[1])){
            $routes[1] = 'index';
        }


        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller).'.php';
        $controller_path = "controller/".$controller_file;
        if(file_exists($controller_path))
        {
           require_once "controller/".$controller_file;
        }
        else
        {

            echo "Ошибка";
        }

        // создаем контроллер
        $controller = new $controller;

        try {
            if(method_exists($controller, $action) && $action == $routes[1])
            {
                // вызываем действие контроллера
                $controller->$action();
            }

        }
        catch (Exception $e) {
            echo "Ошибка".$e ->getMessage() ;
        }



    }


}
