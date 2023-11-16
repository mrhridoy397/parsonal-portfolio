<?php require_once('./controller/CMSController.php'); ?>
<?php
$hero = new CMSController();
$Response = [];
$active = $hero->active;
$index = $hero->getHero();
$about = $hero->getAbout();
$testimonial = $hero->gettestimonials();
$settings = $hero->getSetting();
$skill = $hero->getSkills();
$Fact = $hero->getfacts();
$service = $hero->getservices();
$portfoli = $hero->port($_REQUEST['gid']);
// var_dump($portfoli);

?>





<?php
require_once('./partials/header.php')
?>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Alex Smith</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfoio Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Portfoio Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
        <?php
               
               if(!empty($portfoli)){
               foreach ($portfoli as $item) {
               ?>

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="<?php echo $item['image'] ?>" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?php echo $item['title'] ?></h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $item['Category'] ?></li>
                <li><strong>Client</strong>: <?php echo $item['Client'] ?></li>
                <li><strong>Project date</strong>: <?php echo $item['Projectdate'] ?></li>
                <li><strong>Project URL</strong>: <a href="<?php echo $item['ProjectURL'] ?>"><?php echo $item['ProjectURL'] ?></a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2><?php echo $item['shortTitle'] ?></h2>
              <p><?php echo $item['description'] ?></p>
            </div>
          </div>
          <?php } }else{ echo "Empty" ;} ?>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <?php
require_once('./partials/footer.php');
?>