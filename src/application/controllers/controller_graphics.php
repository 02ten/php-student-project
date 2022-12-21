<?php
class Controller_Graphics extends Controller
{

    function action_index()
    {
        $this->view->generate('public/graphics/index.php');
    }
    function action_graphic1(){
        $this->view->generate('public/graphics/graphic1.php');
    }

    function action_graphic2(){
        $this->view->generate('public/graphics/graphic2.php');
    }
    function action_graphic3(){
        $this->view->generate('public/graphics/graphic3.php');
    }
}
?>