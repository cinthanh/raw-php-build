<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 12/13/18
 * Time: 8:54 AM
 */

class App
{

    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        echo 'this is Class ' . __CLASS__ . ' <br> url is : ';
        $this->parseUrl();
    }

    public function parseUrl()
    {
        $url = $_GET['url'];
        if (isset($_GET['url'])) {
            echo $_GET['url'];
        }
    }
}