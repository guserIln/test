<?php


class Home extends Controller
{
   
    public function index()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }
   
    public function exampleOne()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/home/example_one.php';
        require 'application/views/_templates/footer.php';
    }

   
    public function exampleTwo()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/home/example_two.php';
        require 'application/views/_templates/footer.php';
    }
}
