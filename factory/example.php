<?php

/**
 * EXAMPLE:
 * Factory usage.
 */
require "UniversityFactory.class.php";
$university = UniversityFactory::get('OxfordUniversity');
die("UNIVERSITY NAME: " . $university->getName());
