<?php


namespace Core;


class Config
{

    //single tone
    // 1- run function (getInstance)
    // 2- if the value of property ($_instance) is null so the function will run the class (Config)
    // 3- elseif the value of property is not null the function will prevent run the class (Configs) every time

    private static $_instance;
    private $settings = [];

    public function __construct($config_file)
    {
        $this->settings = include($config_file);
    }

    public static function getInstance($config_file)
    {
        if (self::$_instance === null) {
            self::$_instance = new Config($config_file);
        }
        return self::$_instance;
    }

    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}