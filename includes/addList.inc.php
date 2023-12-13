<?php
    session_start();
    require_once 'autoload.inc.php';

if(isset($_POST['submit'])){
    
    //grabbing the data
    $uid = $_SESSION['useruid'];
    $title = $_POST['title'];
    $date = $_POST['date'];

    //Instantiate ListsContr class
    $list = new ListsContr($title, $date, $uid);

    //Running error handlers and add list
    $list->addList();
    //Going back to front page
    header("location: ../lists.php?error=none");

}