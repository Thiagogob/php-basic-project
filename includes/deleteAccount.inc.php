<?php
session_start();
require_once 'autoload.inc.php';

$user = new SignupContr(null, null, null, null);
$user->deleteUser($_SESSION['useruid']);
session_unset();

session_destroy();



header("location: ../index.php?error=none");