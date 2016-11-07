<?php
include 'Database.php';
    $database = new Database();


$email = 'reg@jobsly.net';
$database->query('SELECT email from useraccounts where email = :email');
$database->bind(':email', $email);
$row = $database->single();
echo $row['email'];

//$database->query('SELECT * FROM testing WHERE name = :lname');
//$database->bind(':lname', 'reggie');

/*
$database->query('SELECT * FROM testing');

$rows = $database->resultset();

foreach($rows as $row){
echo "<pre>"; echo $row['name']; echo "</pre>";
}
*/
//print_r($rows);
    


?>