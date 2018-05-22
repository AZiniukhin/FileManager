<?php
/**
 * Created by PhpStorm.
 * User: Cougar
 * Date: 21.05.2018
 * Time: 10:27
 */

class dir_view
{
    private $list_dirs;
    private $path;

    static $_instance;

    static function get_instance($path = FALSE)
    {
        if (self::$_instance instanceof self) {
            return self::$_instance;
        } else {
            return self::$_instance = new self($path);
        }
    }

    private function __construct($path)
    {

        if ($path) {
            if (substr($path, -1) != '/') {
                $this->path = $path . '/';
            } else {
                $this->path = $path;
            }
            $path = '/' . $path;
        }

        $this->list_dirs = new DirectoryIterator(DIR_PATH . $path);
        return $this->list_dirs;
    }

    private function __wakeup()
    {
    }

    private function __clone()
    {
    }

    public function dirs_to_array()
    {
        $arr = [];
        $i = 0;

        foreach ($this->list_dirs as $res) {
            if (!$res->isDot()) {
                $file_name = $res->getFilename();
                if ($res->isDir()) {
                    $arr['dirs'][$file_name] = $this->path . $file_name;
                } else {
                    $ext = $res->getExtension();

                    $arr['files'][$file_name]['size'] = $res->getSize();

                    $patern = "/^(?:php|html?|css|js|txt)$/i";

                    $patern_img = "/^(?:gif|jpe?g|png|bmp|tiff?|ico)$/i";


                    if(preg_match($patern, $ext)){
                        $arr['files'][$file_name]['type'] = 'text';
                    } elseif (preg_match($patern_img, $ext)) {
                        $arr['files'][$file_name]['type'] = 'img';
                    }
                }
                $i++;
            }
        }

        $arr['old_path'] = substr($this->path, 0, strrpos($this->path, '/', -2));
        $arr['path'] = $this->path;

        return $arr;
    }

    public function dirs_reverse_to_array($course)
    {

        $arr = [];
        $i = 0;

        foreach ($this->list_dirs as $res) {
            if (!$res->isDot()) {
                $file_name = $res->getFilename();
                if ($res->isDir()) {
                    $arr['dirs'][$file_name] = $this->path . $file_name;
                } else {
                    $ext = $res->getExtension();

                    $arr['files'][$file_name]['size'] = $res->getSize();

                    $patern = "/^(?:php|html?|css|js|txt)$/i";

                    $patern_img = "/^(?:gif|jpe?g|png|bmp|tiff?|ico)$/i";


                    if(preg_match($patern, $ext)){
                        $arr['files'][$file_name]['type'] = 'text';
                    } elseif (preg_match($patern_img, $ext)) {
                        $arr['files'][$file_name]['type'] = 'img';
                    }
                }
                $i++;
            }
        }

        ($course == 'min') ? asort($arr['dirs']) : arsort($arr['dirs']) ;
        ($course == 'min') ? asort($arr['files']) : arsort($arr['files']) ;

        $arr['old_path'] = substr($this->path, 0, strrpos($this->path, '/', -2));
        $arr['path'] = $this->path;

        return $arr;

    }

    public function dirs_title_to_array($course)
    {

        $arr = [];
        $i = 0;

        foreach ($this->list_dirs as $res) {
            if (!$res->isDot()) {
                $file_name = $res->getFilename();
                if ($res->isDir()) {
                    $arr['dirs'][$file_name] = $this->path . $file_name;
                } else {
                    $ext = $res->getExtension();

                    $arr['files'][$file_name]['size'] = $res->getSize();

                    $patern = "/^(?:php|html?|css|js|txt)$/i";

                    $patern_img = "/^(?:gif|jpe?g|png|bmp|tiff?|ico)$/i";


                    if(preg_match($patern, $ext)){
                        $arr['files'][$file_name]['type'] = 'text';
                    } elseif (preg_match($patern_img, $ext)) {
                        $arr['files'][$file_name]['type'] = 'img';
                    }
                }
                $i++;
            }
        }

        ($course == 'min') ? ksort($arr['dirs']) : krsort($arr['dirs']) ;
        ($course == 'min') ? ksort($arr['files']) : krsort($arr['files']) ;

        $arr['old_path'] = substr($this->path, 0, strrpos($this->path, '/', -2));
        $arr['path'] = $this->path;

        return $arr;
    }

}