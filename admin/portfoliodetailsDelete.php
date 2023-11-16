<?php require_once('./controller/portfoliodetailsController.php'); ?>
<?php
$portfolio = new portfoliodetailsController();
$Response = [];
$active = $portfolio->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $portfolio->portfoliodetailsDelete($_REQUEST['id']);

?>