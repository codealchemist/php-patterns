<?php

class CambridgeUniversity extends University {
    protected $name = 'Cambridge';
    
    public function addCourse() {
        parent::addCourse();
    }

    public function addStudent() {
        parent::addStudent();
    }

    public function addTeacher() {
        parent::addTeacher();
    }

    public function getContactInfo() {
        parent::getContactInfo();
    }

    public function getCourse() {
        parent::getCourse();
    }

    public function getCoursesList() {
        parent::getCoursesList();
    }

    public function getName() {
        return parent::getName();
    }

    public function getStudent() {
        parent::getStudent();
    }

    public function getStudentsList() {
        parent::getStudentsList();
    }

    public function getTeacher() {
        parent::getTeacher();
    }

    public function getTeachersList() {
        parent::getTeachersList();
    }

    public function setContactInfo() {
        parent::setContactInfo();
    }

}
