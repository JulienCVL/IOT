<?php 
  session_start();
  if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    include("connexion.php");
    header("location:index_ad.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DataSense - Temperature en Temps Réel</title>
  <meta content="Ce site web favorise l’établissement d’une relation optimale entre la personne étudiante et sa direction de recherche.
           Il contient des informations et des ressources essentielles pour un parcours d’études efficace et simplifié. 

Pour faire en sorte que l'un comme l'autre connaissent les rôles attendus autant des personnes étudiantes que des directions de recherche, un guide  destiné aux étudiants a également été rédigé. 
Ce site est disponible pour les étudiants dans la section Étudier en recherche." name="description">
  <meta content="pfe, ensak, ensa, kenitra, gestion stage pfe, ent, université ibn tofail, uit" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/logo.png" rel="icon"> -->
  <link href="assets/img/logo11.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <!-- <a href="index.html"><img src="https://ensa.uit.ac.ma/wp-content/uploads/2019/11/cropped-ensak-logo.png" alt="" class="img-fluid"></a> -->
        <a href="index.html"><img src="assets/img/logo1.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="login.php" class="btn-get-started login">Se connecter</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Température Actuelle <br> <span>Mesure de température en Temps Réel</span></h2>
          <p class="animate__animated animate__fadeInUp">Obtenez la température actuelle en un clin d'œil grâce à notre site web. Soyez informé(e) instantanément des conditions de la température. Notre plateforme offre un accès rapide et simple aux données de température en temps réel.</p>
          <a href="login.php" class="btn-get-started login animate__animated animate__fadeInUp">Se connecter</a>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2 id="about">About</h2>
          <p>Chez DataSense Innovation, nous sommes des experts de la gestion thermique. Grâce à nos automates intelligents de mesure de température, nous garantissons un climat optimal. Nos systèmes réagissent rapidement en allumant le chauffage ou le ventilateur lorsque la température dépasse vos limites. Que ce soit pour votre domicile, votre entreprise ou votre installation industrielle, nous vous offrons un confort sans compromis et des économies d'énergie. Choisissez DataSense Innovation pour un contrôle précis de la température, parce que chaque degré compte !</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3>Mesure de température en Temps Réel.</h3>
            <p class="fst-italic">
            Explorez notre gamme de solutions de gestion thermique, découvrez notre engagement envers l'innovation et la qualité, et laissez-nous vous aider à créer un environnement confortable et éco-énergétique. Faites confiance à DataSense Innovation pour la maîtrise de la température, car chaque degré compte !
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Économies d'Énergie : Notre système intelligent réduit les coûts de chauffage/refroidissement inutiles.</li>
              <li><i class="bi bi-check"></i>Fiabilité : Notre technologie assure un climat stable en toutes circonstances.</li>
              <li><i class="bi bi-check"></i>Simplicité d'Utilisation : Facile à configurer et à utiliser, même pour les non-techniciens.</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-2.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Nos points forts</h3>
            <p class="fst-italic">
             Cette fonctionnalité permet de visualiser: 
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Graphiques de Température : Affichez des graphiques montrant l'évolution de la température dans un espace donné au fil du temps. </li>
              <li><i class="bi bi-check"></i> Acces à l'historique des mesures de température.</li>
              <li><i class="bi bi-check"></i> Acces aux mesure de température en temps réel.</li>
              <li><i class="bi bi-check"></i> Acces aux données brutes.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

  </section><!-- End Contact Section -->

  <!-- ======= Contact Section ======= -->
  <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">

      <div class="section-title">
        <h2 id="contact">Contact Us</h2>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>3 Rue de la Chocolaterie, 41000 Blois - France</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>info@insa-cvl.fr<br>contact@insa-cvl.fr</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>Tél : (+33) 5 37 32 94 48<br>Fax : (+33) 5 37 32 92 4</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact Us</a></li>
            </ul>
          </div>


          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
            3 Rue de la Chocolaterie, <br>
            41000 Blois<br>
              France <br><br>
              <strong>Phone:</strong> (+33) 5 37 32 94 48<br>
              <strong>Email:</strong> info@insa-cvl.fr<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About this website</h3>
            <p align="justify">Explorez notre gamme de solutions de gestion thermique, découvrez notre engagement envers l'innovation et la qualité, et laissez-nous vous aider à créer un environnement confortable et éco-énergétique. Faites confiance à DataSense Innovation pour la maîtrise de la température, car chaque degré compte !</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
