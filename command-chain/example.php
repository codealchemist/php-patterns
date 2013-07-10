<?php

/*
 * EXAMPLE:
 * Command-Chain usage.
 */
require "CommandChain.class.php";
require "EmailCommand.class.php";
require "Student.class.php";
echo "<pre>"; //used for prettier browser output

//student data for John Snow
$johnSnowData = array(
    'name' => 'John Snow',
    'email' => 'john@kingslanding.co'
);

//create Student
$student = new Student($johnSnowData);

//create a commandable (yeah, just invented the word!) student
$commandableStudent = new CommandChain($student);

//add commands; "logNewEmail" and "logSave" commands will be handled by the
//EmailCommand object
$commandableStudent->add(array('logNewEmail', 'logSave'), new EmailCommand);

//run commands
$commandableStudent->run('logNewEmail');
$commandableStudent->run('logSave');
