<?php

/**
 * Instantiation will require passing an object to observe and that will return
 * an observable instance of that object.
 * 
 * @author Alberto Miranda <alberto.php@gmail.com>
 */
class ObserverProxy {
    private $object = null; //stores observed object
    private $objectClassName = null; //object class name
    private $observers = array(); //maps observers watching the object with method calls
    
    public function __construct($object) {
        $this->objectClassName = get_class($object);
        $this->object = $object;
    }
    
    /**
     * Maps passed callback function to passed method on the observed object.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param string $method
     * @param function $function
     */
    public function on($method, $function) {
        $this->observers[$method] = $function;
    }
    
    /**
     * Magic method. Will be called for all method calls on the observed object.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public function __call($method, $params) {
        $className = $this->objectClassName;
        echo "[ OBSERVER ]--> calling '{$className}->$method' with params: " . print_r($params, true);
        
        //call method on object
        $response = call_user_func_array(array($this->object, $method), $params);
        
        //call callback if available
        $this->callback($method);
        
        return $response;
    }
    
    /**
     * Returns true if a callback exists for passed method.
     * False if not.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param string $method
     * @return boolean
     */
    private function hasCallback($method) {
        if (empty($this->observers[$method])) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Executes callback for passed method.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param string $method
     */
    private function callback($method) {
        if ($this->hasCallback($method)) {
            $this->observers[$method]($this->object);
        }
    }
}
