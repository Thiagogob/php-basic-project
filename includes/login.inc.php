<?php
require_once "autoload.inc.php";
if(isset($_POST['submit'])){

    //grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    
    //Instantiate SignupContr class
    $login = new LoginContr($uid, $pwd);

    //Running error handlers and user signup
    $login->loginUser();

    //Getting access to the new page
    header("location: ../lists.php");
    

}
