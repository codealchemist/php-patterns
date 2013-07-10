<?php

/**
 * EXAMPLE:
 * Singleton usage.
 */
require "Database.class.php";
$db = Database::getInstance();
die($db->query('select * from students'));