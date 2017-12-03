<?php
/**
 * Created by PhpStorm.
 * User: robinam
 * Date: 25.11.17
 * Time: 20:40
 */

$d = new User_exit();
$d->exitUser();

class User_exit
{
    public function exitUser(){
        session_start();
        $this->clear_session();
        session_destroy();
        header("Location: http://drawingroom.loc/");
    }

    private function clear_session(){
        $_SESSION['user'] = array();
        if (ini_get("session.use_cookies")){
            $this->del_cookie();
        }
    }

    private function del_cookie(){
        $params = session_get_cookie_params();
        setcookie(session_name(),'',time()-42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]);
    }
}