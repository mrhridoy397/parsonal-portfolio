<?php require_once('./controller/portfoliodetailsController.php'); ?>
<?php
$portfolio = new portfoliodetailsController();
$Response = [];
$active = $portfolio->active;
$data = $portfolio->portfoliodetailsedit($_REQUEST['id']);
$port = $portfolio->getportfolio();
if (isset($_REQUEST['submit']) && count($_REQUEST) > 1) $Response = $portfolio->portfoliodetailsUpdate($_REQUEST, $_FILES);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./partials/meta.php');
    ?>
    <title><?php echo ucfirst($active); ?> - Portfolio</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once('./partials/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <!-- Topbar -->
                <?php
                include_once('./partials/header.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php echo $active; ?></h1>
                        <a href="portfoliodetailsIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
                    </div>
                    <?php if (isset($Response['status']) && !$Response['status']) : ?>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <span><B>Oops!</B> Some errors occurred in your form.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="text-danger">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="form-group">
                                            <label for="categorisId">Assign Categoris</label>
                                            <select name="categorisId" id="categorisId" class="form-control">
                                                <option value="">~~Select Categoris~~</option>
                                                <?php 
                                                foreach($port as $items){
                                                ?>
                                            <option value="<?php echo $items['id'] ?>" <?php if ( $data['categorisId'] == $items['id']) { echo "selected";} ?>><?php echo $items['categories_name'] ?></option>
                                            <?php
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="title" >Title</label>
                                                <input type="text" id="title" class="form-control form-control-user" placeholder="Title" name="title" required autofocus value="<?php if (isset($_POST['title'])) { echo $_POST['title'];  } else {  echo $data['title']; } ?>">
                                                <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['title']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="shortTitle" >Short Title</label>
                                                <input type="text" id="shortTitle" class="form-control form-control-user" placeholder="Short Title" name="shortTitle" required autofocus value="<?php if (isset($_POST['shortTitle'])) { echo $_POST['shortTitle'];  } else {  echo $data['shortTitle']; } ?>">
                                                <?php if (isset($Response['shortTitle']) && !empty($Response['shortTitle'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['shortTitle']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="Category" >Category</label>
                                                <input type="text" id="Category" class="form-control form-control-user" placeholder="Category" name="Category" required autofocus value="<?php if (isset($_POST['Category'])) { echo $_POST['Category'];  } else {  echo $data['Category']; } ?>">
                                                <?php if (isset($Response['Category']) && !empty($Response['Category'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['Category']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="Client" >Client</label>
                                                <input type="text" id="Client" class="form-control form-control-user" placeholder="Client" name="Client" required autofocus value="<?php if (isset($_POST['Client'])) { echo $_POST['Client'];  } else {  echo $data['Client']; } ?>">
                                                <?php if (isset($Response['Client']) && !empty($Response['Client'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['Client']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="Projectdate" >Projectdate</label>
                                                <input type="text" id="Projectdate" class="form-control form-control-user" placeholder="Projectdate" name="Projectdate" required autofocus value="<?php if (isset($_POST['Projectdate'])) { echo $_POST['Projectdate'];  } else {  echo $data['Projectdate']; } ?>">
                                                <?php if (isset($Response['Projectdate']) && !empty($Response['Projectdate'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['Projectdate']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="ProjectURL" >ProjectURL</label>
                                                <input type="text" id="ProjectURL" class="form-control form-control-user" placeholder="ProjectURL" name="ProjectURL" required autofocus value="<?php if (isset($_POST['ProjectURL'])) { echo $_POST['ProjectURL'];  } else {  echo $data['ProjectURL']; } ?>">
                                                <?php if (isset($Response['ProjectURL']) && !empty($Response['ProjectURL'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['ProjectURL']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="description" >Description</label>
                                               <textarea name="description" id="description" cols="30" rows="10"><?php if (isset($_POST['description'])) { echo $_POST['description'];  } else {  echo $data['description']; } ?></textarea>
                                                <?php if (isset($Response['description']) && !empty($Response['description'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['description']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="form-group">
                                            <label for="status">Is Active</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {  echo "selected";  } elseif ($data['status'] == 1) {   echo "selected"; } ?>>Active </option>
                                                <option value="0" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 0) {  echo "selected";} elseif ($data['status'] == 0) { echo "selected"; } ?>>Deactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="../<?php echo $data['image'] ?>" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="image">Categoris Image</label>
                                                <input type="file" name="image" id="image" class="form-control" placeholder=" image">
                                                <input type="hidden" value="<?php echo $data['image'] ?>" name="oldImage">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                            <a href="portfoliodetailsIndex.php" class="btn btn-danger">Cancle</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include_once('./partials/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('./partials/script.php');
    ?>
     <script src="./assets/vendor/ckeditor_4.22.1_full/ckeditor/ckeditor.js"></script>
    <script>  
        CKEDITOR.replace( 'description' );
     </script>



</body>

</html>