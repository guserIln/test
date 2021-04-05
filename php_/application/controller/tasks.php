<?php


class Tasks extends Controller
{
   
    public function index()
    {
         
         
       $this_page = 0;
        $show_pages = 3;
        $offset = 0; 
        $tasks_model = $this->loadModel('TasksModel');
        $tasks = $tasks_model->getAllTasks($offset, $show_pages);

       $stats_model = $this->loadModel('StatsModel');
        $amount_of_tasks = $stats_model->getAmountOfTasks();
       
        require 'application/views/_templates/header.php';
        require 'application/views/tasks/index.php';
        require 'application/views/_templates/footer.php';

 

    }
     public function index2(
      $offset

    )
    {
     
       $this_page = 0;
         $show_pages = 3;
     
     $offset = $show_pages * $offset - $show_pages;
       
        $tasks_model = $this->loadModel('TasksModel');

          $sql2 = "SELECT name, email, flag FROM sort";
        $query = $this->db->prepare($sql2);
        $query->execute();
         $res = $query->fetchAll();
          $tasks = $tasks_model->getAllTasks($offset, $show_pages);

      foreach ($res as $el) {
    
        if ($el->name=='asc'){
                $tasks = $tasks_model->getAllTasksSort($offset, $show_pages,'name', 'asc');
         }
          if ($el->email=='asc'){
                $tasks = $tasks_model->getAllTasksSort($offset, $show_pages,'email', 'asc');
         }
          if ($el->flag=='asc'){
                $tasks = $tasks_model->getAllTasksSort($offset, $show_pages,'flag', 'asc');
         }

          if ($el->name=='desc'){
                $tasks = $tasks_model->getAllTasksSort($offset, $show_pages,'name', 'desc');
         }
          if ($el->email=='desc'){
                $tasks = $tasks_model->getAllTasksSort($offset, $show_pages,'email', 'desc');
         }
          if ($el->flag=='desc'){
                $tasks = $tasks_model->getAllTasksSort($offset, $show_pages,'flag', 'desc');
         }
      }




       $stats_model = $this->loadModel('StatsModel');
        $amount_of_tasks = $stats_model->getAmountOfTasks();
       
        require 'application/views/_templates/header.php';
        require 'application/views/tasks/index.php';
        require 'application/views/_templates/footer.php';


    }
    public function sort($name, $order, $offset){
        $this_page = 0;
        $show_pages = 3;
          $offset = $show_pages * $offset - $show_pages;


        $tasks_model = $this->loadModel('TasksModel');
        $tasks = $tasks_model->getAllTasksSort($offset, $show_pages,$name, $order);
        $stats_model = $this->loadModel('StatsModel');
        $amount_of_tasks = $stats_model->getAmountOfTasks();
       
        require 'application/views/_templates/header.php';
        require 'application/views/tasks/index.php';
        require 'application/views/_templates/footer.php';


    }

    public function addTask()
    {
        
      
         
        
        if (isset($_POST["submit_add_task"])) { 
            $tasks_model = $this->loadModel('TasksModel');
            $tasks_model->addTask(htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["email"]),  htmlspecialchars($_POST["ztext"]));
            header('location: ' . URL . 'index.php?url=index');
        }
        header('location: ' . URL . 'index.php?url=tasks/add');
    }
     public function editTask()
    {
         if (isset($_SESSION['user']) and $_SESSION['user']=='1') {
       
        if (isset($_POST["submit_edit_task"])) { 
          $id = 0;
           if (isset($_POST["id"])) {   $id = $_POST["id"]; }
          $tasks_model = $this->loadModel('TasksModel');
$tasks_model->editTask($_POST["name"], $_POST["email"],  $_POST["ztext"],$_POST["id"],$_POST["flag".$id]);
            header('location: ' . URL . 'index.php?url=tasks/edit');
        }
      }
        header('location: ' . URL . 'index.php?url=tasks/edit');

    }
       public function errorTask()
    {
       echo 'Неверный логин или пароль';
        header('location: ' . URL . 'error.php');
    }
}
