<?php
require_once 'config.php';

Class DB
{

    private static $_instance;

    private function __construct()
    {
    }

    public static function getInstance(array $options = NULL)
    {
        if(self::$_instance === NULL) {

            if($options === NULL) {
                throw new InvalidArgumentException('null options first run');
            }

            try {
                self::$_instance = new PDO($options['dsn'], $options['user'], $options['password'], $options['driver_options']);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        return self::$_instance;
    }

}

$DB = DB::getInstance(array(
    'dsn'=>'mysql:dbname=' . Config::DB_NAME . ';host=' . Config::DB_HOST,
    'user' => Config::DB_USER,
    'password' => '',
    'driver_options' => array(
        PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8'
    )));
