<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 12/13/18
 * Time: 9:04 AM
 */

class HomeController extends Controller
{

    public function __construct()
    {


    }

    public function index()
    {
        echo 'HomeController@index';
    }

    public function doSomething()
    {
        
    }

    public function play($a, $b, $c)
    {
        echo 123;
    }
}