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
      <?php
      if (!empty($about)) {
        foreach ($about[0] as  $data) {


      ?>
          <img src="<?php echo $data['image']; ?>" alt="" class="img-fluid rounded-circle">
          <h1 class="text-light"><a href="index.php"><?php echo $data['Name']; ?></a></h1>
          <div class="social-links mt-3 text-center">
            <a href="<?php echo $data['link1']; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="<?php echo $data['link2']; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="<?php echo $data['link3']; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="<?php echo $data['link4']; ?>" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="<?php echo $data['link5']; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
      <?php }
      } ?>
    </div>

    <nav id="navbar" class="nav-menu navbar">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
        <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
        <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <div class="hero-container" data-aos="fade-in">
    <?php
    if (!empty($index)) {
      foreach ($index[0] as  $value) {


    ?>
        <h3 class="text-light"><?php echo  $value['title']; ?></h3>
        <h1><?php echo  $value['Name']; ?></h1>
        <p>I'm <span class="typed" data-typed-items="<?php echo  $value['subject']; ?>"></span></p>
    <?php }
    } ?>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="section-title">
        <?php
        if (!empty($about)) {
          foreach ($about[0] as  $data) {


        ?>
            <h2><?php echo $data['title'] ?></h2>
            <p><?php echo $data['about'] ?></p>
        <?php }
        } ?>
      </div>

      <div class="row">
        <?php
        if (!empty($about)) {
          foreach ($about[0] as  $data) {


        ?>
            <div class="col-lg-4" data-aos="fade-right">
              <img src="<?php echo $data['image'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
              <h3><?php echo $data['subject'] ?></h3>
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo $data['dob'] ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?php echo $data['website'] ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $data['phone'] ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo $data['city'] ?></span></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo $data['age'] ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php echo $data['degree'] ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $data['email'] ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?php echo $data['freelance'] ?></span></li>
                  </ul>
                </div>
              </div>
              <p><?php echo $data['description'] ?></p>
            </div>
        <?php }
        } ?>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Facts Section ======= -->
  <section id="facts" class="facts">
    <div class="container">

      <div class="section-title">
        <h2><?php echo $settings[19]['description']; ?></h2>
        <p><?php echo $settings[3]['description']; ?></p>
      </div>

      <div class="row no-gutters">
        <?php
        foreach ($Fact as $value) {


        ?>
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span><?php echo  $value[0]['success']; ?></span>
              <p><strong><?php echo  $value[0]['title']; ?></strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span><?php echo  $value[1]['success']; ?></span>
              <p><strong><?php echo  $value[1]['title']; ?></strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span><?php echo  $value[2]['success']; ?></span>
              <p><strong><?php echo  $value[2]['title']; ?></strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span><?php echo  $value[3]['success']; ?></span>
              <p><strong><?php echo  $value[3]['title']; ?></strong></p>
            </div>
          </div>
        <?php } ?>

      </div>

    </div>
  </section><!-- End Facts Section -->

  <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills section-bg">
    <div class="container">

      <div class="section-title">
        <h2><?php echo $settings[4]['description']; ?></h2>
        <p><?php echo $settings[5]['description']; ?></p>
      </div>

      <div class="row skills-content">
        <?php
        foreach ($skill[0] as  $value) {


        ?>

          <div class="col-lg-12" data-aos="fade-up">

            <div class="progress">
              <span class="skill"><?php echo $value['name'] ?><i class="val"><?php echo $value['skills'] ?></i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>
        <?php } ?>

      </div>

    </div>
  </section><!-- End Skills Section -->

  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container">

      <div class="section-title">
        <h2><?php echo $settings[6]['description']; ?></h2>
        <p><?php echo $settings[7]['description']; ?></p>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-up">
          <h3 class="resume-title">Sumary</h3>
          <div class="resume-item pb-0">
            <h4>Alex Smith</h4>
            <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
            <ul>
              <li>Portland par 127,Orlando, FL</li>
              <li>(123) 456-7891</li>
              <li>alice.barkley@example.com</li>
            </ul>
          </div>

          <h3 class="resume-title">Education</h3>
          <div class="resume-item">
            <h4>Master of Fine Arts &amp; Graphic Design</h4>
            <h5>2015 - 2016</h5>
            <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
            <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
          </div>
          <div class="resume-item">
            <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
            <h5>2010 - 2014</h5>
            <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
            <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <h3 class="resume-title">Professional Experience</h3>
          <div class="resume-item">
            <h4>Senior graphic design specialist</h4>
            <h5>2019 - Present</h5>
            <p><em>Experion, New York, NY </em></p>
            <ul>
              <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
              <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
              <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
              <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
            </ul>
          </div>
          <div class="resume-item">
            <h4>Graphic design specialist</h4>
            <h5>2017 - 2018</h5>
            <p><em>Stepping Stone Advertising, New York, NY</em></p>
            <ul>
              <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
              <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
              <li>Recommended and consulted with clients on the most appropriate graphic design</li>
              <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Resume Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container">

      <div class="section-title">
        <h2><?php echo $settings[8]['description']; ?></h2>
        <p><?php echo $settings[9]['description']; ?></p>
      </div>

      <div class="row" data-aos="fade-up">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2><?php echo $settings[10]['description']; ?></h2>
        <p><?php echo $settings[11]['description']; ?></p>
      </div>

      <div class="row">
      <?php 
        foreach ($service[0] as  $value) {
          
        ?>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
        <div class="icon"><i class="bi bi-bar-chart"></i></div>
          <h1 class="title"><a href=""><?php echo $value['title'] ?></a></h1>
          <p class="description"><?php echo $value['Description'] ?></p>
        </div>
        <?php }?>
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container">

      <div class="section-title">
        <h2><?php echo $settings[12]['description']; ?></h2>
        <p><?php echo $settings[13]['description']; ?></p>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <?php
          foreach ($testimonial['0'] as $value) {


          ?>
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?php echo $value['description'] ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?php echo $value['image'] ?>" class="testimonial-img" alt="">
                <h3><?php echo $value['name'] ?></h3>
                <h4><?php echo $value['subject'] ?></h4>
              </div>
            </div><!-- End testimonial item -->
          <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2><?php echo $settings[14]['description']; ?></h2>
        <p><?php echo $settings[15]['description']; ?></p>
      </div>

      <div class="row" data-aos="fade-in">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p><?php echo $settings[16]['description']; ?></p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p><?php echo $settings[17]['description']; ?></p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p><?php echo $settings[18]['description']; ?></p>
            </div>

            <iframe src="<?php echo $settings[22]['description']; ?>" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

        </div>

        <div class="col-md-6">
          <form method="post" id="massage_frm" class="form-signin">
            <div class="form-group">
              <label for="name"> Name </label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Your name">
            </div>
            <div class="form-group">
              <label for="email"> Email </label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Your email address">
            </div>
            <div class="form-group">
              <label for="subject"> Subject </label>
              <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <label for="message"> Massage </label>
              <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="massage here...."></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-info mt-3" id="massageSubmit">Submit now</button>
            </div>

          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->



<script>
  $(document).ready(function(e) {
    $("#massage_frm").on('submit', (function(e) {
      e.preventDefault();
      var datas = new FormData(this);
      console.log(datas);
      $.ajax({
        url: './contactApi.php',
        type: "POST",
        data: datas,
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
          var result = JSON.parse(result);
          console.log(result);
          if (result.statusCode == 200) {
            Swal.fire({
              position: 'bottom-end',
              icon: 'success',
              title: result.Msg,
              showConfirmButton: false,
              timer: 3000
            });
            $('#massageSubmit').removeAttr('disabled');
            $('#massageSubmit').text('Enroll');
            setTimeout(() => {
              location.reload();
            }, 3000);

          }
          console.log(result);
        }
      });
    }));
  });
</script>


<?php
require_once('./partials/footer.php');
?>