<?php require_once('./controller/heroController.php'); ?>
<?php
$Hero = new HeroController();
$Response = [];
$active = $Hero->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Hero->HeroDelete($_REQUEST['id']);

?>