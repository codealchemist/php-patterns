<?php

/**
 * Student class.
 * 
 * @author Alberto Miranda <alberto.php@gmail.com>
 */
class Student {
    private $name = null;
    private $email = null;
    private $exams = null;
    
    public function __construct($params) {
        if (!empty($params['name'])) $this->setName($params['name']);
        if (!empty($params['email'])) $this->setEmail($params['email']);
        if (!empty($params['exams'])) $this->setExams($params['exams']);
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        echo "[ STUDENT ]--> setEmail: $email\n";
        $this->email = $email;
    }

    public function getExams() {
        return $this->exams;
    }

    public function setExams($exams) {
        $this->exams = $exams;
    }
    
    public function save() {
        echo "[ STUDENT ]--> SAVE\n";
    }
    
    public function callback($params) {
        echo "[ STUDENT ]--> callback, params: " . print_r($params, true) . "\n";
    }
}