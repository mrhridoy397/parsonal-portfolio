<?php require_once('./controller/TestimoninalController.php'); ?>
<?php
$Testimoninal = new Testimoninals();
$Response = [];
$active = $Testimoninal->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Testimoninal->deleteTestimoninal($_REQUEST['id']);

?>