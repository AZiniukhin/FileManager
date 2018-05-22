<?php
/**
 * Created by PhpStorm.
 * User: Cougar
 * Date: 21.05.2018
 * Time: 18:06
 */

class reverse extends abase
{
    function get_body()
    {
        $course = '';
        if ($_GET['path_min'] || $_GET['path_max']) {
            if ($_GET['path_min']) {
                $path = $_GET['path_min'];
                $course = 'min';
            } else {
                $path = $_GET['path_max'];
                $course = 'max';
            }
            $obj = dir_view::get_instance($path);
        } else {
            $obj = dir_view::get_instance();
        }

        return $obj->dirs_reverse_to_array($course);

    }
}