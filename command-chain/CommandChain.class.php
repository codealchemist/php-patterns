<?php

class CommandChain {
    private $object = null;
    public function __construct($object) {
        $this->object = $object;
    }
    
    /**
     * Adds new command to chain.
     * Passed object will be called to handle any of the passed commands.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param array $commands
     * @param mixed $object
     */
    public function add($commands, $object) {
        //init command chain if empty
        if (empty($this->object->__commandHandlers)) {
            $this->object->__commandHandlers = array();
        }
        
        //get command chain
        $commandChain = $this->object->__commandHandlers;
        
        
        //add new commands to chain
        foreach ($commands as $newCommandName) { //iterate new commands
            //if new command exists in chain append it
            if (!empty($commandChain[$newCommandName])) {
                array_merge($commandChain[$newCommandName], array($object));
            } else {
                $commandChain[$newCommandName] = array($object);
            }
        }
        
        //update chain
        $this->object->__commandHandlers = $commandChain;
    }
    
    /**
     * Runs passed command across the command chain.
     * All objects registered to handle this command will be called.
     * The object itself will be passed as argument on each call.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param string $command
     */
    public function run($command) {
        echo "[ COMMAND-CHAIN ]--> RUN '$command'\n";
        //print_r($this->object->__commandHandlers); exit;
        
        //return false if command doesn't exist
        if (empty($this->object->__commandHandlers[$command])) return false;
        
        //run command and return its output
        $commandChain = $this->object->__commandHandlers[$command];
        foreach($commandChain as $commandObject) {
            $class = get_class($commandObject);
            echo "[ COMMAND-CHAIN ]--> calling '{$class}->$command'...\n";
            $commandObject->$command($this->object);
        }
    }
}