<?php 
  session_start();
  if (isset($_SESSION['login']) && isset($_SESSION['type'])) {
    $login = $_SESSION['login'];
    include("connexion.php");
    if ($_SESSION['type']=="student") {
      $sql = "SELECT * FROM etudiant WHERE email = '".$login."'";
      $result = mysqli_query($conn,$sql);
      $visite = mysqli_fetch_assoc($result);
      if ($visite['visite']==1) {
        header("location:index_et.php");
      }else {
        header("location:./etudiant/infos.php");
      }
    }elseif ($_SESSION['type']=="prof") {
      $sql = "SELECT * FROM enseignant WHERE email = '".$login."'";
      $result = mysqli_query($conn,$sql);
      $visite = mysqli_fetch_assoc($result);
      if ($visite['visite']==1) {
        header("location:index_pr.php");
      }else {
        header("location:./prof/change_pass.php");
      }
    }elseif ($_SESSION['type']=="admin") {
      header("location:index_ad.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion des stages PFE - ENSA Kénitra</title>
  <meta content="Ce site web favorise l’établissement d’une relation optimale entre la personne étudiante et sa direction de recherche.
           Il contient des informations et des ressources essentielles pour un parcours d’études efficace et simplifié. 

Pour faire en sorte que l'un comme l'autre connaissent les rôles attendus autant des personnes étudiantes que des directions de recherche, un guide  destiné aux étudiants a également été rédigé. 
Ce site est disponible pour les étudiants dans la section Étudier en recherche." name="description">
  <meta content="pfe, ensak, ensa, kenitra, gestion stage pfe, ent, université ibn tofail, uit" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/logo.png" rel="icon"> -->
  <link href="https://ensa.uit.ac.ma/wp-content/uploads/2019/11/cropped-ensak-logo.png" rel="icon">

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
          <h2 class="animate__animated animate__fadeInDown">Gestion des stages PFE <span>ENSA Kénitra</span></h2>
          <p class="animate__animated animate__fadeInUp">Pour que les pratiques d'encadrement suivent une certaine culture propre à L’ENSAK  et qu'ainsi chaque étudiant, chaque professeur puisse s'appuyer sur une formule éprouvée, nous avons conçu un guide qui recense les meilleures pratiques en matière d’encadrement aux études supérieures en recherche.</p>
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
          <p>Ce site web favorise l’établissement d’une relation optimale entre la personne étudiante et sa direction de recherche.
           Il contient des informations et des ressources essentielles pour un parcours d’études efficace et simplifié. 

Pour faire en sorte que l'un comme l'autre connaissent les rôles attendus autant des personnes étudiantes que des directions de recherche, un guide  destiné aux étudiants a également été rédigé. 
Ce site est disponible pour les étudiants dans la section Étudier en recherche.</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3>Stage de fin d’études et premier emploi.</h3>
            <p class="fst-italic">
              Le lien entre votre stage de fin d’études et votre premier emploi doit être tangible, c’est pourquoi nous vous conseillons de réfléchir attentivement à plusieurs facteurs avant de faire votre choix.

            </p>
            <ul>
              <li><i class="bi bi-check"></i> Il est important de choisir votre stage de fin d’études dans une optique de premier emploi.</li>
              <li><i class="bi bi-check"></i>Prenez donc bien le temps de définir votre projet professionnel, et décidez en conséquence.</li>
              <li><i class="bi bi-check"></i> N’oubliez pas que ce qui importe, ce sont vos compétences..</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-2.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Statistiques</h3>
            <p class="fst-italic">
             Cette fonctionnalité permet à l'administration de visualiser: 
            </p>
            <ul>
              <li><i class="bi bi-check"></i> le pourcentage des étudiants avec et sans encadrant. </li>
              <li><i class="bi bi-check"></i>Le pourcentage des étudiants inscrits dans le site. </li>
              <li><i class="bi bi-check"></i>Le pourcentage des stages validés pour la soutenance.</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5">
            <h3>Où faire votre stage de fin d’études</h3>
            <p>Une des questions que vous devez également vous poser lors de votre choix entre plusieurs PFE, c’est le type de structure que vous souhaitez intégrer.</p>
            <ul>
              <li><i class="bi bi-check"></i> Si vous pensez être davantage à l’aise dans une petite structure, préférez postuler et accepter une offre dans ce type d’entreprise plutôt que dans une grande société. Vous aurez généralement moins l’opportunité dans ces dernières de participer à un projet dans sa globalité et aurez moins d’interactions avec les décideurs ; c’est pourquoi il est important de savoir ce que vous recherchez.</li>
              <li><i class="bi bi-check"></i> Ecoutez votre instinct, si une entreprise vous fait une mauvaise impression, même si les indemnités sont plus élevées, restez vigilants au risque de vous retrouver dans un stage qui ne vous correspond pas. De la même manière, apprenez à discerner les stages qui ne sont « pas sérieux » en demandant l’avis de votre entourage ou de vos professeurs.</li>
              <li><i class="bi bi-check"></i>Analysez bien les missions que l’on vous propose afin d’éviter de vous ennuyer rapidement ou d’effectuer des tâches qui ne vous permettront pas de monter en compétences.</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-4.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Après votre stage</h3>
            <p class="fst-italic">
              A l’issue de votre stage veillez dans la mesure du possible à garder le contact et à rester en bons termes avec vos tuteurs/collègues.
            </p>
            <p>
               N’oubliez pas que votre vie professionnelle ne fait que commencer à la sortie de votre école d’ingénieur ou de l’université ! Remplir son carnet d’adresses dès son stage peut s’avérer très utile. Ceci d’autant plus que vous serez peut-être amené un jour à renseigner des références pour un poste, si votre stage s’est bien déroulé vous pourrez tout à fait demander à votre ancien tuteur de rédiger pour vous une lettre de recommandation.<br>

                Enfin, n’oubliez pas de transmettre une copie de votre rapport de stage à votre tuteur.
            </p>
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
                <p>Campus universitaire, B.P 241, Kénitra - Maroc</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>Tél : (+212) 5 37 32 94 48<br>Fax : (+212) 5 37 32 92 4</p>
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

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Services numériques</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://ent.uit.ac.ma/">ENT</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://ead.uit.ac.ma/moodle/">Moodle</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.cnrst.ma/index.php/fr/">Recherche</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ensa.uit.ac.ma/">ENSAK</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.uit.ac.ma/">UIT Kénitra</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Campus universitaire, <br>
              B.P 241, Kénitra<br>
              Maroc <br><br>
              <strong>Phone:</strong> (+212) 5 37 32 94 48<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About this website</h3>
            <p align="justify">Pour que les pratiques d'encadrement suivent une certaine culture propre à L’ENSAK et qu'ainsi chaque étudiant, chaque professeur puisse s'appuyer sur une formule éprouvée, nous avons conçu un guide qui recense les meilleures pratiques en matière d’encadrement aux études supérieures en recherche.</p>
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
