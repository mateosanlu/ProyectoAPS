<?php

class DatabaseServer extends PDO
{
    public function __construct() {
        parent::__construct(
                'mysql:host=' . DBS_HOST .
                ';dbname=' . DBS_NAME,
                DBS_USER, 
                DBS_PASS, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DBS_CHAR
                    ));
                
    }
}

?>
