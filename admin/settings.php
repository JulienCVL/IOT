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
        <a href="#">
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
        <a href="./statistiques.php">
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





		<div class="mainDiv">
  <div class="cardStyle">
    <form action="" method="post" name="signupForm" id="signupForm">
      
      <img src="" id="signupLogo"/>
      
      <h4 class="formTitle">
        Changer Ton Mot De Passe
      </h4>
      
    <div class="inputDiv">
      <label class="inputLabel" for="password">New Password</label>
      <input type="password" id="password" name="password" required>
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword">
    </div>
    
    <div class="buttonWrapper">
      <button name="continue" type="submit" id="submitButton" onclick="validateSignupForm()" class="submitButton pure-button pure-button-primary">
        <span>Continue</span>
  
      </button>
    </div>
      
  </form>
  </div>
</div>
            <?php
			if(isset($_POST['continue'])){
				if(isset($_POST['password']) && !empty($_POST['password'])){
					$new_pass = htmlspecialchars($_POST['password']);
					$passw = "UPDATE admin SET password = '".$new_pass."'WHERE login ='".$_SESSION['login']."'";
					mysqli_query($conn, $passw);
					
				}
			
			}

?>
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

    <script src="js/chng_pss.js"></script>
</body>

</html>