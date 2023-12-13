<?php
session_start();
require_once 'autoload.inc.php';

if (isset($_GET['listid'])){

    $id = $_GET['listid'];
    $title = $_GET['listtitle'];
    $date = $_GET['listdate'];
    $uid = $_GET['listuid'];

    $list = new ListsContr($title, $date, $uid);

    $list->deleteList($id);

    header("Location: ../lists.php?error=none");
}

