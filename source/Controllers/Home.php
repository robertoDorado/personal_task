<?php
namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Auth\Users;

/**
 * Home Controllers
 * @package Source\Controllers
 */
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(empty(session()->user)){
            redirect("/login");
        }
        
        $users = new Users;
        $ip = $_SERVER['REMOTE_ADDR'];
        $id = session()->user;
        $users = $users->find("ip=:ip AND id=:id", "ip={$ip}&id={$id}")->fetch();

        if(empty($users) || $users->verify == 0){
            redirect("/login");
        }
        echo $this->view->render("home", [
            "title" => "Home"
        ]);
    }
}