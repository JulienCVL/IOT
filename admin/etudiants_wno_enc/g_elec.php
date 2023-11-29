<?php 
  session_start();
  include "../../connexion.php";
  if (isset($_SESSION['login'])) {
    if ($_SESSION['type']!="admin") {
      header("location:../../403.php");
    }
  }else {
    header("location:../../login.php");
  }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Boxiocns-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/stylead.css">
    <link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../css/table.css">
    <title>Les étudiants sans encadrant (Génie Electrique)</title>
    <link href="https://ensa.uit.ac.ma/wp-content/uploads/2019/11/cropped-ensak-logo.png" rel="icon">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bx-menu'></i>
      <span class="logo_name">Menu</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../../index_ad.php">
          <i class='bx bx-briefcase' ></i>
          <span class="link_name">Stages</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Stages</a></li>
        </ul>
      </li>
      <li>
        <a href="../li_profs.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Enseignants</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Enseignants</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="../etudiants_wno_enc.php">
            <i class='bx bx-id-card' ></i>
            <span class="link_name">Étudiants</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Étudiants</a></li>
          <li><a href="./g_info.php">G.Informatique</a></li>
          <li><a href="./g_indus.php">G.Indus</a></li>
          <li><a href="./g_meca.php">G.Mécatronique</a></li>
          <li><a href="#">G.Électrique</a></li>
          <li><a href="./g_rst.php">G.RST</a></li>
        </ul>
      </li>
      <li>
        <a href="../affichage_note.php">
          <i class='bx bx-file' ></i>
          <span class="link_name">Affichage</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Affichage</a></li>
        </ul>
      </li>
      <li>
        <a href="../statistiques.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Statistiques</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Statistiques</a></li>
        </ul>
      </li>
      <li>
        <a href="../settings.php">
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
        <img src="../images/img.jpeg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Admin</div>
        <div class="job">Admin profil</div>
      </div>
      <a href="../../deconnexion.php">
        <i class='bx bx-log-out'></i>
      </a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="logo"><img src="../images/ENSA-KENITRA.png" alt="Ensa kenitra"
              style="width: 140px; height: 60px;">
      </div>
  </nav>
  <h4 align="center">La liste des étudiants sans encadrant (Génie Electrique)</h4>
  <div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="card">
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>N°APOGEE</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Filière</th>
                                <th>Sujet du stage</th>
                                <th>Rapport du stage</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $sql = "SELECT * from etudiant where ISNULL(id_encadrant)=1 and filiere = 'NDIGEEL' and visite=1 order by nom";
                            $result = mysqli_query($conn,$sql);
                            $count = 0;
                            while ($data=mysqli_fetch_assoc($result)) { 
                              $count++;
                              if ($count%2 == 0) { ?>
                                <tr class="even gradeX">
                                  <td class="center"><?php echo $data['num_appogee']; ?></td>
                                  <td><?php echo $data['nom']; ?></td>
                                  <td><?php echo $data['prenom']; ?></td>
                                  <td class="center"><?php echo $data['filiere']; ?></td>
                                  <td><?php echo $data['sujet_stage']; ?></td>
                                  <?php 
                                    if ($data['rapport']) { ?>
                                      <td class="center"><a href="../../etudiant/et_files/rapport/<?php echo $data['rapport']; ?>" download>Download</a></td>
                              <?php }else { ?>
                                      <td class="center">Download</td>
                              <?php } ?>
                                </tr>
                        <?php }else { ?>
                                <tr class="odd gradeX">
                                  <td class="center"><?php echo $data['num_appogee']; ?></td>
                                  <td><?php echo $data['nom']; ?></td>
                                  <td><?php echo $data['prenom']; ?></td>
                                  <td class="center"><?php echo $data['filiere']; ?></td>
                                  <td><?php echo $data['sujet_stage']; ?></td>
                                  <?php 
                                    if ($data['rapport']) { ?>
                                      <td class="center"><a href="../../etudiant/et_files/rapport/<?php echo $data['rapport']; ?>" download>Download</a></td>
                              <?php }else { ?>
                                      <td class="center">Download</td>
                              <?php } ?>
                                </tr>
                        <?php }
                            }
                          ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
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
  <!-- DATA TABLE SCRIPTS -->
  <script src="../js/jquery.dataTables.js"></script>
  <script src="../js/dataTables.bootstrap.js"></script>
  <script>
      $(document).ready(function () {
          $('#dataTables-example').dataTable();
      });
  </script>
</body>
</html>