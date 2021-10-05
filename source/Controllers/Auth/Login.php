<?php

namespace Source\Controllers\Auth;

use Source\Core\Controller;
use Source\Models\Auth\Users;

/**
 * Home Controllers
 * @package Source\Controllers
 */
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(?array $data = [])
    {
        if (is_csrf($data)) {
            $users = new Users;
            $users = $users->find("email=:email", "email={$data['email']}")->fetch();

            if (empty($users->email)) {
                $response["error"] = true;
                echo json_encode($response);
                exit;
            }

            if (!empty($users)) {

                if (!empty($data['password'])) {

                    if (password_verify($data['password'], $users->password)) {

                        $users->verify = 1;
                        $users->ip = $_SERVER['REMOTE_ADDR'];

                        session()->set("user", $users->id);

                        if ($users->save()) {
                            $response['success'] = true;
                            echo json_encode($response);
                            exit;
                        }
                    }

                    $response["error"] = true;
                    echo json_encode($response);
                    exit;
                }
            }
        }
        echo $this->view->render("login", [
            "title" => "Login"
        ]);
    }

    public function logout(?array $data = [])
    {

        if (!empty($data['log'])) {

            $users = (new Users)->findById($data['log']);
            $users->verify = 0;
            session()->unset("user");

            if ($users->save()) {
                echo 0;
            }
        }
    }
}
