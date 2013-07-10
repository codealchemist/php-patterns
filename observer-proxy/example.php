<?php

/*
 * EXAMPLE:
 * Observer-proxy usage.
 */
require "ObserverProxy.class.php";
require "Student.class.php";
echo "<pre>"; //used for prettier browser output

//student data for John Snow
$johnSnowData = array(
    'name' => 'John Snow',
    'email' => 'john@kingslanding.co'
);

//create Student
$student = new Student($johnSnowData);

//create an observable instance of the student
//all calls to Student methods will be proxied thru the ObserverProxy object
$observableStudent = new ObserverProxy($student);

//set callbacks; note that callback function will receive the object being
//observed as first param
$observableStudent->on('setEmail', function($object){
    echo "[ OBSERVER ]--> Student.setEmail callback, Object: " . print_r($object, true);
    $object->yeah = 'set on Student.setEmail callback';
});
$observableStudent->on('callback', function($object){
    echo "[ OBSERVER ]--> Student.callback callback, Object: " . print_r($object, true);
});

//work with the observable student
//using @var will make the autocomplete magic happen in NetBeans and similar IDEs
/* @var $observableStudent Student */
$observableStudent->setEmail('alberto.php@gmail.com');
$observableStudent->callback('ROCK!');