<?php
require_once "University.class.php";
class UniversityFactory {
    /**
     * Returns the requested University concrete object.
     * All returned Universities are childs of the same University class.
     * 
     * @param string $university
     * @return University
     * @throws Exception
     */
    public static function get($university) {
        $path = dirname(__FILE__);
        $class = "$path/$university.class.php";
        if (!file_exists($class)) throw new Exception ("Oops, class not found: $class");
        
        require_once $class;
        $object = new $university;
        return $object;
    }
}
