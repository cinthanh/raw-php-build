<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 12/13/18
 * Time: 10:48 AM
 */

class CreateDateController extends Controller
{
    public function index()
    {
        echo 'create date';
    }

    public function playGameHey($a)
    {
        echo $a, $_GET['dev'], '<br>';
        $user = $this->model('User');
        $data['user'] = $user->getAll();
//echo "<pre>";print_r($data);echo "</pre>";die;
        $this->view('home/test-view', $data);
    }
}