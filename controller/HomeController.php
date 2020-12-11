<?php



	class HomeController {

        public function index()
        {
            require_once 'view/main.php';
            $tasks = new Task();
            $homecon = $tasks->select('tasks');

            return $homecon;

        }
        public function viewtask($count){
            require_once 'view/main.php';
            $tasks = new Task();
            $paginat = $tasks->select('tasks','*',null,null,$count.',3');

            return $paginat;
        }

        public function addtask($mastask){
            if(!empty($mastask)){
                $task = new Task();
                $userName = $mastask['userName'];
                $email = $mastask['email'];
                $tasks = $mastask['task'];
                $task->add('tasks',$userName,$email,$tasks);


            }
        }

        public function sort($count,$sortmas = null,$ord = null){

            $tasks = new Task();
            $sort = $sortmas;
            if($ord == 'up'){
                $order = 'ASC';
            }
            else{
                $order = 'DESC';
            }

            $c = $count.',3';
            $sorts = $tasks->select('tasks ','*','',$sort.' '.$order,$c);

            return $sorts;
        }


    }
