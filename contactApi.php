<?php 
require "./controller/CMSController.php";
// require_once('./controller/CMSConroller.php');
// header("Content-Type: application/json", true);
$hero = new CMSController();
// $email = $_POST['email'];
$hero->CreateMassege($_REQUEST);
// echo json_encode($_REQUEST);
// echo json_encode($_FILES);
?>