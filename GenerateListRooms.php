<?php
/**
 * Created by PhpStorm.
 * User: robinam
 * Date: 02.12.17
 * Time: 13:13
 */

class GenerateListRooms
{
    function __construct()
    {
        foreach (glob("image_room/*.txt") as $filename){
            $name =  basename($filename, ".txt"). '<br>';
            echo '<li>';
            echo'<a href="js" class="rooms waves-effect no_active" style="color: white"><i class="ti-layout fa-fw"></i>' . $name . '</a>';
            echo '</li>';
        }
    }
}