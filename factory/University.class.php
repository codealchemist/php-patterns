<?php

abstract class University {
    protected $name = null;
    public function getName() {
        return $this->name;
    }
    abstract public function addStudent();
    abstract public function getStudent();
    abstract public function getStudentsList();
    abstract public function setContactInfo();
    abstract public function getContactInfo();
    abstract public function addCourse();
    abstract public function getCourse();
    abstract public function getCoursesList();
    abstract public function addTeacher();
    abstract public function getTeacher();
    abstract public function getTeachersList();
};