<?php
namespace Old\Model;

class Application
{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = null;

    public function __construct()
    {
        $this->splitUrl();
        if(!$this->url_controller)
        {
            $page = new \Old\Controller\HomeController();
            $page->index();
        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->url_controller) . 'Controller.php')){
            $controller = "\\Old\\Controller\\" . ucfirst($this->url_controller) . "Controller";
            $this->url_controller = new $controller();
            if (method_exists($this->url_controller, (string)$this->url_action))
            {
                if(!empty($this->url_params)) {
                    call_user_func_array(arrey($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                if (empty($this->url_action)) {
                    $this->url_controller->index();
                } else {
                    header('location: ' . URL . 'error');
                }
            }
        }
    }
}
