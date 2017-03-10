<?php

include 'Database.php';
$database = new Database();

$database->query('SELECT count(id) as ok from adminaccounts where email = :email and password = :password');
$database->bind(':email', $user);
$database->bind(':password', $password);

$row = $database->single();
$ok = $row['ok'];

?>