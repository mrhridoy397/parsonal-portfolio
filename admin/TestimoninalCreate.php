<?php require_once('./controller/TestimoninalController.php'); ?>
<?php
$Testimoninal = new Testimoninals();
$Response = [];
$active = $Testimoninal->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Testimoninal->createTestimoninal($_REQUEST, $_FILES);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./partials/meta.php');
    ?>
    <title><?php echo ucfirst($active); ?> - Protfolio</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Create Testimoninal</h1>
                        <a href="TestimoninalIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All Testimoninal</a>
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
                    .<div class="row">
                        <div class="col-md-7 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create at Testimoninal</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-signin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="name" class="form-control form-control-user" placeholder="Enter Name " name="name" required autofocus value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
                                                <?php if (isset($Response['name']) && !empty($Response['name'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['name']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="subject">Subject <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="subject" class="form-control form-control-user" placeholder=" Enter Subject " name="subject" required autofocus value="<?php if (isset($_POST['subject'])) echo $_POST['subject']; ?>">
                                                <?php if (isset($Response['subject']) && !empty($Response['subject'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['subject']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label class="control-label" for="description">Description</label>
                                               <textarea name="description" id="description" cols="30" rows="10"><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea>
                                                <?php if (isset($Response['description']) && !empty($Response['description'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['description']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="status">Is Active</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">~~Select~~</option>
                                                    <option value="1" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {
                                                                            echo "selected";
                                                                        } ?>>Active </option>
                                                    <option value="0" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 0) {
                                                                            echo "selected";
                                                                        } ?>>Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="image"> Featured Image</label>
                                                <input type="file" name="image" id="image" class="form-control" placeholder=" image" value="<?php if (isset($_FILES['image'])) {
                                                                                                                                                echo $_FILES['image'];
                                                                                                                                            } ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                                            <button class="btn btn-md btn-primary btn-primary" type="submit">Save Slider</button>
                                            <a href="TestimoninalIndex.php" class="btn btn-md btn-primary btn-danger">Cencle</a>
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