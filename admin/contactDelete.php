<?php require_once('./controller/contactController.php'); ?>
<?php
$massage = new contactModels();
$Response = [];
$active = $massage->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $massage->delete($_REQUEST['id']);

?>