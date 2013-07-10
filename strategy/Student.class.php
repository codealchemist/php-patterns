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
    private $grade = null;
    
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
        //echo "[ STUDENT ]--> setEmail: $email\n";
        $this->email = $email;
    }

    public function getExams() {
        return $this->exams;
    }

    public function setExams($exams) {
        $this->exams = $exams;
    }
    
    public function save() {
        //echo "[ STUDENT ]--> SAVE\n";
    }
    
    public function callback($params) {
        //echo "[ STUDENT ]--> callback, params: " . print_r($params, true) . "\n";
    }
    
    public function setGrade($grade) {
        $this->grade = $grade;
    }
    
    public function getGrade() {
        return $this->grade;
    }
    
    /**
     * Sets and returns grade for current student using passed grading strategy.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param GradingStrategy $gradingStrategy
     */
    public function grade($gradingStrategy) {
        $class = get_class($gradingStrategy);
        $grade = $gradingStrategy->grade( $this->getExams() );
        $this->setGrade($grade);
        
        echo "[ STUDENT ]--> grade with '$class': $grade\n";
        return $grade;
    }
}