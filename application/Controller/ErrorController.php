<?php
namespace Old\Controller;

class ErrorController
{
    public function index()
    {
        require APP . 'view/templates/header.php';
        require APP . 'view/error/index.php';
        require APP . 'view/templates/footer.php';
    }
}