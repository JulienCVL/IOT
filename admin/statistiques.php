<?php
    session_start();
    include "../connexion.php";
    if (isset($_SESSION['login'])) {
        if ($_SESSION['type']!="admin") {
        header("location:../403.php");
        }
    }else {
        header("location:../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="css/chng_pss.css">


	<!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Boxiocns-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/stylead.css">
    <link rel="stylesheet" href="./css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="./css/table.css">
    <link href="https://ensa.uit.ac.ma/wp-content/uploads/2019/11/cropped-ensak-logo.png" rel="icon">
    <style>
        .parent{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .highcharts-background{
         fill: #e4e9f7;
        }
        .highcharts-credits{
          display: none;
        }
    </style>
</head>

<body>


<!-- ================================================ -->
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bx-menu'></i>
      <span class="logo_name">Menu</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../index_ad.php">
          <i class='bx bx-briefcase' ></i>
          <span class="link_name">Stages</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Stages</a></li>
        </ul>
      </li>
      <li>
        <a href="./li_profs.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Enseignants</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Enseignants</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="./etudiants_wno_enc.php">
            <i class='bx bx-id-card' ></i>
            <span class="link_name">Étudiants</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Étudiants</a></li>
          <li><a href="./etudiants_wno_enc/g_info.php">G.Informatique</a></li>
          <li><a href="./etudiants_wno_enc/g_indus.php">G.Indus</a></li>
          <li><a href="./etudiants_wno_enc/g_meca.php">G.Mécatronique</a></li>
          <li><a href="./etudiants_wno_enc/g_elec.php">G.Électrique</a></li>
          <li><a href="./etudiants_wno_enc/g_rst.php">G.RST</a></li>
        </ul>
        <li>
        <a href="./affichage_note.php">
          <i class='bx bx-file' ></i>
          <span class="link_name">Affichage</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Affichage</a></li>
        </ul>
      </li>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Statistiques</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Statistiques</a></li>
        </ul>
      </li>
      <li>
        <a href="./settings.php">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="./images/img.jpeg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Administration</div>
        <div class="job">Admin profil</div>
      </div>
      <a href="../deconnexion.php">
        <i class='bx bx-log-out'></i>
      </a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="logo"><img src="./images/ENSA-KENITRA.png" alt="Ensa kenitra"
              style="width: 140px; height: 60px;">
      </div>
  </nav>
<!-- ========================================================= -->
<!-- 1. Add JQuery and Highcharts in the head of your page -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
           <script src="http://code.highcharts.com/highcharts.js"></script>

           <!-- 2. You can add print and export feature by adding this line -->
           <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">
     jQuery(document).ready(function() { 
    Highcharts.chart('container1', {
       chart: {
           plotBackgroundColor: null,
           plotBorderWidth: null,
           plotShadow: false,
           type: 'pie'
       },
       title: {
           text: 'les etudiants avec ou sans encadrant'
       },
       tooltip: {
           pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
       },
       plotOptions: {
           pie: {
               allowPointSelect: true,
               cursor: 'pointer',
               dataLabels: {
                   enabled: true,
                   format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                   style: {
                       color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                   }
               }
           }
       },
       series: [{
           name: 'les etudiants avec ou sans encadrant',
           colorByPoint: true,
           data: [{
               name: 'Avec encadrant',
               <?php 
                $sql = "SELECT count(num_appogee) from etudiant where id_encadrant > 0";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);
               ?>
               y: <?php echo $data[0] ?>.00
           }, {
               name: 'Sans encadrant',
               <?php 
                $sql1 = "SELECT count(num_appogee) from etudiant where ISNULL(id_encadrant)=1";
                $result1 = mysqli_query($conn, $sql1);
                $data1 = mysqli_fetch_array($result1);
                ?>
               y: <?php echo $data1[0] ?>.00
            
           }]
       }]
}   );
    });
    </script>
     <!-- 3. Add the container -->
     <div class="parent">
         <div id="container1" style="width:50%; height:100%; margin-top: 20px;"></div>  
         <div class="child">
             <iframe src="statistiques1.php" frameborder="0" width="550px" height="650px"></iframe> 
             <iframe src="statistiques2.php" frameborder="0" width="550px" height="650px"></iframe> 
         </div> 
     </div>
	</section>
	<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e)=>{
     let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
     arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });
  </script>

</body>

</html>