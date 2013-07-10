<?php

class EmailCommand {
    public function logNewEmail($object) {
        echo "[ EMAIL-COMMAND ]--> logNewEmail: Object: " . print_r($object, true) . "\n";
        $object->yeah = 'changed by EmailCommand->logNewEmail';
    }
    
    public function logSave($object) {
        echo "[ EMAIL-COMMAND ]--> logSave: Object: " . print_r($object, true) . "\n";
        echo "[ EMAIL-COMMAND ]--> logSave: yeah value: {$object->yeah}\n";
    }
}