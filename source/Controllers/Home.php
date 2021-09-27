<?php
namespace Source\Controllers;

use Source\Core\Controller;

/**
 * Home Controllers
 * @link 
 * @author Roberto Dorado <robertodorado7@gmail.com>
 * @package Source\Controllers
 */
class Home extends Controller
{
    /**
     * Home constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo $this->view->render("home", []);
    }
}
