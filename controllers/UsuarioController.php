<?php
// session_start();

require_once '../config/Controller.php';
require_once '../model/Usuario.php';

class UsuarioController extends Controller {

    public function auth() {
        $user = new Usuario();
        $resp = $user->where('email', "'".$_POST['email']."'");
        if(!is_null($resp)){
            if(password_verify($_POST['password'], $resp['password'])){
                $_SESSION['token'] = bin2hex(random_bytes((15 - (15 % 2)) / 2));
                echo $_SESSION['token'];
            }else{
                $this->responseJson(['msg' => 'User Unathorized']);
            }
        }else{
            $this->responseJson(['msg' => 'User Unathorized']);
        }
    }

    public function register() {
        $user = new Usuario();
        $resp = $user->insert([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_ARGON2I)
        ]);
        $this->responseJson($resp);
    }

    public function logout() {
        session_destroy();
        echo $_SESSION['token'];
    }
    
}