<?php
    session_start();
    require_once 'autoload.inc.php';

if(isset($_POST['submit'])){
    
   
    $itemId = $_GET['itemid'];
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];



    $listTitle = $_GET['listtitle'];
    $listId = $_GET['listid'];

    //Instantiate ListsContr class
    $item = new ItemsContr(null, null, null, null);


    $item->updateListItem($itemId, $itemName, $price, $quantity);
    
    //Going back to front page
    header("location: ../items.php?error=none&listid=$listId&listtitle=$listTitle");

}