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
CREATE TABLE IF NOT EXISTS malpractice(
    time_stamp datetime,
    curr_status int
);
";
$db->exec($createTableQuery);

$createTableQuery2 = "
DELETE FROM malpractice;
CREATE TABLE IF NOT EXISTS temp(
    id text,
    correct int,
    diff_score float
);DELETE FROM temp;
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