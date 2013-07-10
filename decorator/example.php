<?php

/*
 * EXAMPLE:
 * Decorator pattern usage.
 */
require "Student.class.php";
require "StudentHtmlDecorator.class.php";
require "StudentTextDecorator.class.php";

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
            'id' => 'EX-001',
            'date' => '2013-07-09',
            'result' => 9
        )
    )
);

//create Student
$johnSnow = new Student($johnSnowData);

//decorate for HTML output
$studentHtml = new StudentHtmlDecorator($johnSnow);
$name = $studentHtml->getName();
$email = $studentHtml->getEmail();
$exams = $studentHtml->getExams();
echo <<<EOF
<pre>
    <h1>HTML DECORATED</h1>
    NAME: $name
    EMAIL: $email
        
    EXAMS: 
    $exams
</pre>
EOF;

//decorate for text output
$studentText = new StudentTextDecorator($johnSnow);
$name = $studentText->getName();
$email = $studentText->getEmail();
$exams = $studentText->getExams();
echo <<<EOF
<pre>
    <h1>TEXT DECORATED</h1>
    NAME: $name
    EMAIL: $email
        
    EXAMS: 
    $exams
</pre>
EOF;
