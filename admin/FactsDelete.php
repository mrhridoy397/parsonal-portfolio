<?php require_once('./controller/FactsController.php'); ?>
<?php
$facts = new factsController();
$Response = [];
$active = $facts->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $facts->factsDelete($_REQUEST['id']);

?>