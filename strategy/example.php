<?php

/*
 * EXAMPLE:
 * Strategy usage.
 */
require "GradingStrategy.class.php";
require "DropLowestGradingStrategy.class.php";
require "HighestGradingStrategy.class.php";
require "Student.class.php";
echo "<pre>"; //used for prettier browser output

//student data for John Snow
$johnSnowData = array(
    'name' => 'John Snow',
    'email' => 'john@kingslanding.co',
    'exams' => array(
        1 => array(
            'id' => 'EX-001',
            'date' => '2013-06-09',
            'result' => 7
        ),
        2 => array(
            'id' => 'EX-002',
            'date' => '2013-07-08',
            'result' => 9
        ),
        3 => array(
            'id' => 'EX-003',
            'date' => '2013-07-09',
            'result' => 2
        )
    )
);

//create Student
$student = new Student($johnSnowData);

//calculate grade using different grading strategies
$defaultGrade = $student->grade(new GradingStrategy);
$dropLowestGrade = $student->grade(new DropLowestGradingStrategy);
$highestGrade = $student->grade(new HighestGradingStrategy);
