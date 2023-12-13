<?php
    session_start();
    require_once 'autoload.inc.php';

if(isset($_POST['submit'])){
    
    //grabbing the data
    $listId = $_GET['listid'];
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $listTitle = $_GET['listtitle'];
    
    //Instantiate ListsContr class
    $item = new ItemsContr($listId, $itemName, $price, $quantity);

    //Running error handlers and add list
    $item->addItem();
    //Going back to front page
    header("location: ../items.php?error=none&listid=$listId&listtitle=$listTitle");

}