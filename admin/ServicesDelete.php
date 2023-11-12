<?php require_once('./controller/ServicesController.php'); ?>
<?php
$services = new ServicesController();
$Response = [];
$active = $services->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $services->servicesDelete($_REQUEST['id']);

?>