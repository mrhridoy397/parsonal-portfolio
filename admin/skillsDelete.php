<?php require_once('./controller/skillsController.php'); ?>
<?php
$skills = new skillsController();
$Response = [];
$active = $skills->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $skills->skillsDelete($_REQUEST['id']);

?>