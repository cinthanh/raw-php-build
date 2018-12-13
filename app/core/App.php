<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 12/13/18
 * Time: 8:54 AM
 */

class App
{

    protected $controller = 'HomeController'; // on url home or home-anything-test
    protected $method = 'index'; // on url method-something -> methodSomething
    protected $params = [];


    public function __construct()
    {
        echo 'this is Class ' . __CLASS__ . ' <br> url is : ';
        $url = $this->parseUrl();
        $path_controller = '../app/controllers/';
        $res = '';
        if (strpos($url[0], '-') == true) {
            $urls = explode('-', $url[0]);

            foreach ($urls as $v) {
                $res .= ucfirst($v);
            }

        } else {
            $res = $url[0];
        }

        //get controller # ../app/controllers/HomeController.php
        if (file_exists($path_controller.ucfirst($res).'Controller.php')) {
            $this->controller = ucfirst($res) . 'Controller';
            unset($url[0]);
        }

        require_once $path_controller . $this->controller . '.php';

        $this->controller = new $this->controller;

        $method_str = '';
        $methods = strpos($url[1], '-') ? explode('-', $url[1]) : $url[1];

        if (is_array($methods)) {
            foreach ($methods as $k => $val) {
                if ($k !== 0) {
                   $method_str .= ucfirst($val);
                } else {
                    $method_str .= $val;
                }
            }
        } else {
            $method_str = $methods;
        }

        if (isset($url[1])) {
            if (method_exists($this->controller, $method_str)) {
                $this->method = $method_str;
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseUrl()
    {
        $url = $_GET['url'];
        if (isset($url))
        {
            $url = rtrim($url, '/'); # cut / trc & sau

            $url = explode('/', filter_var($url,FILTER_SANITIZE_URL));

            return $url;

        }
    }
}