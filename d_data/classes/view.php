<?php

/**
 * Created by PhpStorm.
 * User: zipman
 * Date: 22.05.18
 * Time: 19:39
 */
class view extends abase
{
    public function get_body()
    {
        if($_GET['path']){
            $path = $_GET['path'];

            $file = view_file::get_instance($path);

            $result = [];

            $result['content'] = $file->get_content_file();
            $result['path'] = $path;
            $result['old_path'] = substr($path, 0, strrpos($path, '/'));

            return $result;
        }
    }
}