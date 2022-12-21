<?php
class Controller_Shop extends Controller
{

    function action_index()
    {
        $this->view->generate('public/shop/index.html');
    }

    function action_catalog()
    {
        $this->model = new Model_Shop();
        $data = $this->model->get_data();
        $this->view->generate('public/shop/catalog.php', $data);
    }

    function action_about()
    {
        $this->view->generate('public/shop/about.php');
    }
}
?>