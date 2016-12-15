<?php

include 'Database.php';
$database = new Database();

$database->query('SELECT count(id) as ok from useraccounts where email = :email and password = :password and usertype = :usertype and isverified = 1');
$database->bind(':email', $user);
$database->bind(':password', $password);
$database->bind(':usertype', $usertype);

$row = $database->single();
$ok = $row['ok'];

?>