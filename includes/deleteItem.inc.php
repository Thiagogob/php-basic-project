<?php
session_start();
require_once 'autoload.inc.php';

if (isset($_GET['itemid'])){

    $id = $_GET['itemid'];
    $listTitle = $_GET['listtitle'];
    $listId = $_GET['listid'];

    $item = new ItemsContr(null, null, null, null);

    $item->deleteItem($id);

    header("Location: ../items.php?error=none&listtitle=$listTitle&listid=$listId");
}

