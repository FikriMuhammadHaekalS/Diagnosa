<?php

class App
{
    protected $controller =  'Login';
    protected $method = 'index';
    protected $param = [];
    public function __construct()
    {
        $url = $this->parseUrl();
        // var_dump($url);  // Debugging untuk melihat nilai $url

        if ($url && file_exists('app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // parameter
        if (!empty($url)) {
            $this->param = array_values($url);
        }
        // jalankan kontroler dan method
        call_user_func_array([$this->controller, $this->method], $this->param);
    }
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
