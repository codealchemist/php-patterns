<?php

/**
 * Database singleton.
 * 
 */
class Database {
    //unique instance will be stored here
    private static $instance;

    //disallow access to constructor to avoid bypassing getInstance
    private function __construct() {}

    //disallow cloning this class to avoid bypassing of getInstance
    private function __clone() {}
    
    /**
     * Returns a unique instance of Database.
     * 
     * @return Database
     */
    public static function getInstance() {
        //if we already have an instance return it
        if (self::$instance != null) {
            return self::$instance;
        }
        
        //create a new instance, store it and return it
        $class = __CLASS__;
        self::$instance = new $class;
        return self::$instance;
    }
    
    /**
     * Runs passed query on current database connection.
     * 
     * @param string $query
     */
    public function query($query) {
        echo "QUERING DATABASE: $query";
    }
}
