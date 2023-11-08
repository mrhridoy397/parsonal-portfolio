<?php require_once('./controller/contactController.php'); ?>
<?php
$massage = new contactModels();
$Response = [];
$active = $massage->active;
$data = $massage->edit($_REQUEST['id']);

if (isset($_REQUEST['submit']) && count($_REQUEST) > 0) $Response = $massage->Update($_REQUEST);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./partials/meta.php');
    ?>
    <title><?php echo ucfirst($active); ?> - Educafe</title>
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
                        <a href="contactIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
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
                            <div class="col-md-12 ">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <div class="tile-body">
                                                <div class="row">

                                                </div>
                                                <div class="row">


                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                                                            <input class="form-control " type="text" name="name" id="name" value="<?php if (isset($_REQUEST['name'])) {
                                                                                                                                        echo $__REQUEST['name'];
                                                                                                                                    } else {
                                                                                                                                        echo $data['name'];
                                                                                                                                    } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="email">email<span class="m-l-5 text-danger"> *</span></label>
                                                            <input class="form-control " type="email" name="email" id="email" value="<?php if (isset($_REQUEST['email'])) {
                                                                                                                                            echo $__REQUEST['email'];
                                                                                                                                        } else {
                                                                                                                                            echo $data['email'];
                                                                                                                                        } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="subject">Subject<span class="m-l-5 text-danger"> *</span></label>
                                                            <input class="form-control " type="text" name="subject" id="subject" value="<?php if (isset($_REQUEST['subject'])) {
                                                                                                                                            echo $__REQUEST['subject'];
                                                                                                                                        } else {
                                                                                                                                            echo $data['subject'];
                                                                                                                                        } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="message"> Massage </label>
                                                            <textarea class="form-control " type="text" name="message" id="message" cols="30" rows="10"><?php if (isset($_REQUEST['message'])) {
                                                                                                                                                            echo $__REQUEST['message'];
                                                                                                                                                        } else {
                                                                                                                                                            echo $data['message'];
                                                                                                                                                        } ?></textarea>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label" for="status">Status<span class="m-l-5 text-danger"> *</span></label>
                                                                <select class="form-control " name="status" id="status">
                                                                    <option value="">--Select--</option>
                                                                    <option value="1" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {
                                                                                            echo "selected";
                                                                                        } elseif ($data['status'] == 1) {
                                                                                            echo "selected";
                                                                                        } ?>>Active</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 offset-md-5">
                                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                                            <a href="contactIndex.php" class="btn btn-danger">Cancle</a>
                                                        </div>
                                                    </div>

                                                </div>
                                        </form>
                                    </div>
                                </div>
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


</body>

</html>