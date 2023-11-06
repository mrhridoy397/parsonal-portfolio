<?php require_once('./controller/AboutController.php'); ?>
<?php
$about = new About();
$Response = [];
$active = $about->active;
// $News = $Batch->getNews();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $about->createAbout($_REQUEST, $_FILES);

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
                        <h1 class="h3 mb-0 text-gray-800">Create About</h1>
                        <a href="AboutIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All About</a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Create at About</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-signin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="title" class="form-control form-control-user" placeholder="Enter Title " name="title" required autofocus value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
                                                <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['title']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="Name">Name <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="Name" class="form-control form-control-user" placeholder="Enter Name " name="Name" required autofocus value="<?php if (isset($_POST['Name'])) echo $_POST['Name']; ?>">
                                                <?php if (isset($Response['Name']) && !empty($Response['Name'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['Name']; ?></small>
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
                                                <label for="dob">DOB <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="date" id="dob" class="form-control form-control-user" placeholder=" Enter Dob " name="dob" required autofocus value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>">
                                                <?php if (isset($Response['dob']) && !empty($Response['dob'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['dob']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="age">Age <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="age" class="form-control form-control-user" placeholder=" Enter Age " name="age" required autofocus value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>">
                                                <?php if (isset($Response['age']) && !empty($Response['age'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['age']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="website">Website<span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="website" class="form-control form-control-user" placeholder=" Enter website URL " name="website" required autofocus value="<?php if (isset($_POST['website'])) echo $_POST['website']; ?>">
                                                <?php if (isset($Response['website']) && !empty($Response['website'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['website']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="degree">Degree <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="degree" class="form-control form-control-user" placeholder=" Enter Degree " name="degree" required autofocus value="<?php if (isset($_POST['degree'])) echo $_POST['degree']; ?>">
                                                <?php if (isset($Response['degree']) && !empty($Response['degree'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['degree']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="phone">Phone <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="phone" class="form-control form-control-user" placeholder=" Enter Phone " name="phone" required autofocus value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                                                <?php if (isset($Response['phone']) && !empty($Response['phone'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['phone']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="email" id="email" class="form-control form-control-user" placeholder=" Enter Email " name="email" required autofocus value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                                                <?php if (isset($Response['email']) && !empty($Response['email'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['email']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="city">City <span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="city" class="form-control form-control-user" placeholder=" Enter City " name="city" required autofocus value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>">
                                                <?php if (isset($Response['city']) && !empty($Response['city'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['city']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="freelance">Freelance<span class="m-l-5 text-danger"> *</span></label>
                                                <input type="text" id="freelance" class="form-control form-control-user" placeholder=" Enter Freelance " name="freelance" required autofocus value="<?php if (isset($_POST['freelance'])) echo $_POST['freelance']; ?>">
                                                <?php if (isset($Response['freelance']) && !empty($Response['freelance'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['freelance']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label class="control-label" for="link1">Twitter Link </label>
                                                <input class="form-control form-control-user" type="url" name="link1" id="link1" placeholder="https://" required autofocus value="<?php if (isset($_POST['link1'])) echo $_POST['link1']; ?>">
                                                <?php if (isset($Response['link1']) && !empty($Response['link1'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['link1']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label class="control-label" for="link2">Facebook Link </label>
                                                <input class="form-control form-control-user" type="url" name="link2" id="link2" placeholder="https://" required autofocus value="<?php if (isset($_POST['link2'])) echo $_POST['link2']; ?>">
                                                <?php if (isset($Response['link2']) && !empty($Response['link2'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['link2']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label class="control-label" for="link3">Instagram Link </label>
                                                <input class="form-control form-control-user" type="url" name="link3" id="link3" placeholder="https://" required autofocus value="<?php if (isset($_POST['link3'])) echo $_POST['link3']; ?>">
                                                <?php if (isset($Response['link3']) && !empty($Response['link3'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['link3']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label class="control-label" for="link4">Google+ Link </label>
                                                <input class="form-control form-control-user" type="url" name="link4" id="link4" placeholder="https://" required autofocus value="<?php if (isset($_POST['link4'])) echo $_POST['link4']; ?>">
                                                <?php if (isset($Response['link4']) && !empty($Response['link4'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['link4']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label class="control-label" for="link5">LinkDin Link </label>
                                                <input class="form-control form-control-user" type="url" name="link5" id="link5" placeholder="https://" required autofocus value="<?php if (isset($_POST['link5'])) echo $_POST['link5']; ?>">
                                                <?php if (isset($Response['link5']) && !empty($Response['link5'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['link5']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label class="control-label" for="about">About</label>
                                               <textarea name="about" id="about" cols="30" rows="10"><?php if (isset($_POST['about'])) echo $_POST['about']; ?></textarea>
                                                <?php if (isset($Response['about']) && !empty($Response['about'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['about']; ?></small>
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
                                            <a href="AboutIndex.php" class="btn btn-md btn-primary btn-danger">Cencle</a>
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
        CKEDITOR.replace( 'about' );
        CKEDITOR.replace( 'description' );
     </script>

</body>

</html>