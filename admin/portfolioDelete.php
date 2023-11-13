<?php require_once('./controller/portfolioController.php'); ?>
<?php
$portfolio = new portfolioController();
$Response = [];
$active = $portfolio->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $portfolio->delete($_REQUEST['id']);

?>