<?php
    session_start();
    require_once 'autoload.inc.php';

if(isset($_POST['submit'])){
    
   
    $listId = $_GET['listid'];
    $title = $_POST['title'];
    $date = $_POST['date'];

    //Instantiate ListsContr class
    $list = new ListsContr(null, null, null);


    $list->updateList($listId, $title, $date);
    
    //Going back to front page
    header("location: ../lists.php?error=none");

}