<?php
/**
 * Created by PhpStorm.
 * User: robinam
 * Date: 02.12.17
 * Time: 13:13
 */

class Generate_room{
    function __construct()
    {
        foreach (glob("image_room/*.txt") as $filename){
            $name =  basename($filename, ".txt"). '<br>';
            echo '<li>';
            echo'<a href="js" class="waves-effect no_active"><i class="ti-layout fa-fw"></i>' . $name . '</a>';
            echo '</li>';
        }
    }
}