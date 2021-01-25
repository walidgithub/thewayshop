<?php


use Core\Config;
use Core\Database;

class App{
    private $db;
    private static $_instance;
    public $cur_page = 'index';
    public static $path;

    public static function getInstance(){
        if(self::$_instance === null) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        include(ROOT.'/App/Autoloader.php');
        \App\Autoloader::register();

    }

    public function getDb(){
        if ($this->db === null) {
            $config = Config::getInstance(ROOT.'/Config/config.php');
            $this->db = new Database($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));
        }
        return $this->db;
    }

    public function getModel($name){
        $model = '\App\Model\\'.ucfirst($name).'Model';
        return new $model($this->getDb());
    }

}