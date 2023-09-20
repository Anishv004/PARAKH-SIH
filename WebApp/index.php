<?php 
require_once('config.php');
require_once('controllers/homeController.php');

$createTableQuery = "
CREATE TABLE IF NOT EXISTS Qn_bank(
    question text,
    exp text,
    cop int,
    opa text,
    opb text,
    opc text,
    opd text,
    subject_name text,
    id text,
    correct int,
    total int,
    diff_score float
);
";
$db->exec($createTableQuery);

$createTableQuery2 = "
DROP TABLE IF EXISTS temp;
CREATE TABLE IF NOT EXISTS temp(
    id text,
    correct int,
    diff_score float
);
";
$db->exec($createTableQuery2);

$createTableQuery3 = "
CREATE TABLE IF NOT EXISTS userhistory (
    total_result INT,
    average_difficulty FLOAT,
    created_at DATETIME
);
";
$db->exec($createTableQuery3);

$controller = new homeController($db);
$controller->processForm();

include_once('views/home.php');

?>