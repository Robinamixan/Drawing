<?php
/**
 * Created by PhpStorm.
 * User: robinam
 * Date: 02.12.17
 * Time: 19:02
 */

if(isset($_POST['room_name'])){
    $file = 'image_room/' . $_POST['room_name'] . '.txt';
    if (!file_exists($file)){
        $fp = fopen($file,'w');
        fclose($fp);
        chmod($file,"0750");
    }
}