<?php
    require_once 'autoload.inc.php';
if(isset($_POST['submit'])){

    //grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    //Instantiate SignupContr class
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    //Running error handlers and user signup
    $signup->signupUser();

    //Instantiate SignupContr class
    $login = new LoginContr($uid, $pwd);

    //Running error handlers and user signup
    $login->loginUser();
    
    //Getting access to the new page
    header("location: ../lists.php");

    //header("location: ../index.php?error=none");

}