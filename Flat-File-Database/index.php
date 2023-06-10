<?php
require_once "DBCSV.php";
$csv = new DBCSV("employee.csv");
$csv->loadsRecords();
// add some record

$record = array("2005", "devil", "zone", "M", "1234567890","hellodevil.com", "Development", "PHP Developer");
$csv->addRecord($record);
echo php.ini;
