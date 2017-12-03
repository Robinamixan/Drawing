<?php

class Authorize
{
    private $result = false;
    private $user;


    function __construct()
    {
        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $this->user = json_decode($s, true);
        $this->check_data();
    }

    public function print_user(){
        $this->check_session();
        echo '<a class="profile-pic" href="#">' ;
        echo '<img src="' . $this->user['photo'] . '" alt="user-img" width="36" class="img-circle">';
        echo '<b class="hidden-xs">' . $this->user['first_name']. " " . $this->user['last_name'] . '</b> </a>';
    }

    private function check_session(){
        session_start();
        if ($_SESSION['user'] != null){
            $this->user = $_SESSION['user'];
        }
        else{
            $this->user['photo'] = "images/user.png";
            $this->user['first_name'] = "undefined user";
        }

    }

    private function check_data(){
        if (!array_key_exists("error",$this->user)){
            session_start();
            $_SESSION['user'] = $this->user;
            header("Location: http://drawingroom.loc/room.php");
        }
    }
}