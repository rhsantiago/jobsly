<?php
$email='';
$usertype='';
$companyname='';
if(isset($_POST['email'])){ 
    $email = $_POST['email']; 
}

if(isset($_POST['password'])){ $password = $_POST['password']; } 
if(isset($_POST['usertype'])){ $usertype = $_POST['usertype']; }
if(isset($_POST['companyname'])){ $companyname = $_POST['companyname']; } 

include 'Database.php';
$database = new Database();

$database->query('SELECT email from useraccounts where email = :email');
$database->bind(':email', $email);
$row = $database->single();
$verify = $row['email'];

if($verify){
  echo 'emailtaken';  
}else{
    $verifyhash = hash("sha256",$password.date("YmdHis"));
    $password = hash("sha256", $password);
   
    date_default_timezone_set('Asia/Manila');
    $signupdate = date("Y-m-d");
    if($usertype == 'jobseeker'){
        $usertype = 2;       
    }else if($usertype == 'employer'){
        $usertype = 1;   
    }    
   
    $database->query(' INSERT INTO useraccounts (id, email, password, usertype,companyname, verifyhash, signupdate) VALUES (NULL, :email, :password, :usertype, :companyname, :verifyhash, :signupdate)');
    $database->bind(':companyname', $companyname);
    $database->bind(':email', $email);
    $database->bind(':password',  $password);
    $database->bind(':usertype', $usertype);
    $database->bind(':verifyhash', $verifyhash);
    $database->bind(':signupdate', $signupdate);
    $database->execute();
?> 
    


    <div id="msgSubmit" class="msgSubmit">
        <div class="row-fluid">
            <div class="col-md-12 registered-image"><img src="img/fireworks.png"></div>
            <div class="col-md-12"><span class="registered-message"> Thank you for registering! Please check your <span class="registered-email"><?=$email ?></span> inbox for the verification link
                  in order to activate your account. </span></div>
        </div>
        
        </div>
<?php
}

?>