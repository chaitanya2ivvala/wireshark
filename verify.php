<?php
include_once 'connect.php';
if(isset($_GET['email']) && !empty($_GET['email'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
   
                 
    $search = mysql_query("SELECT * FROM users WHERE email='".$email."' AND activation='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE users SET activation='1' WHERE email='".$email."' AND activation='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}
?>