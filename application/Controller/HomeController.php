<?php
namespace Old\Controller;

class HomeController
{
    public function index()
    {
        require APP . 'view/templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/templates/footer.php';
    }

}
