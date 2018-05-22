<?php
/**
 * Created by PhpStorm.
 * User: Cougar
 * Date: 21.05.2018
 * Time: 10:15
 */

class main extends abase
{
    function get_body()
    {
        if($_GET['path']){
            $path = $_GET['path'];
            $obj = dir_view::get_instance($path);

        } else {
            $obj = dir_view::get_instance();
        }

        return $obj->dirs_to_array();
    }

}