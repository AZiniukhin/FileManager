<?php
header("Content-Type:text/html; charset='UTF-8'");

require_once 'd_data/config.php';

//echo "<pre>";
//print_r($_GET);
//echo "</pre>";

if ($_GET['do']) {
    $name = strip_tags($_GET['do']);

    if (file_exists(CLASSES . $name . ".php")) {
        $class_name = $name;
    } else {
        $class_name = 'main';
    }
} else {
    $class_name = 'main';
}

function __autoload($class_name)
{
    require_once(CLASSES . $class_name . ".php");
}

$obj = new $class_name;

$res_arr = $obj->get_body();


require_once THEME . $class_name . '.tpl.php';


