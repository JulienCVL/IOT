<?php 
  session_start();
  include "./connexion.php";
  if (isset($_SESSION['login'])) {
    if ($_SESSION['type']!="prof") {
      header("location:./403.php");
    }
  }else {
    header("location:./login.php");
  }
  if (isset($_POST['encadrer'])) {
    $req1 = "UPDATE etudiant set id_encadrant = '".$_SESSION['id_user']."' where num_appogee = '".$_POST['encadrer']."'";
    $res1 = mysqli_query($conn, $req1);
  }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
  <!-- Boxiocns-->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./prof/css/materialize.min.css">
  <link rel="stylesheet" href="./prof/css/profs.css">
  <link rel="stylesheet" href="./prof/css/table1.css">
  <title>Liste des étudiants</title>
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
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-briefcase'></i>
            <span class="link_name">Stages</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Stages</a></li>
          <li><a href="./prof/stages/g_info.php">G.Informatique</a></li>
          <li><a href="./prof/stages/g_indus.php">G.Indus</a></li>
          <li><a href="./prof/stages/g_meca.php">G.Mécatronique</a></li>
          <li><a href="./prof/stages/g_elec.php">G.Électrique</a></li>
          <li><a href="./prof/stages/g_rst.php">G.RST</a></li>
        </ul>
      </li>
      <li>
        <a href="./prof/valider.php">
          <i class='bx bx-check-square'></i>
          <span class="link_name">Valider</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Valider</a></li>
        </ul>
      </li>
      <li>
        <a href="./prof/noter.php">
          <i class='bx bx-edit'></i>
          <span class="link_name">Noter</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Noter</a></li>
        </ul>
      </li>

      <li>
        <a href="./prof/change_pass.php">
          <i class='bx bx-cog'></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="./prof/images_profile/<?php echo $_SESSION['photo'] ?>" alt="">
          </div>
          <div class="name-job">
            <div class="profile_name"><?php echo $_SESSION['nom']." ".$_SESSION['prenom'] ?></div>
            <div class="job">prof profil</div>
          </div>
          <a href="deconnexion.php">
            <i class='bx bx-log-out'></i>
          </a>
        </div>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="logo"><img src="./prof/images/ENSA-KENITRA.png" alt="Ensa kenitra" style="width: 140px; height: 60px;">
      </div>
      <div class="icon" id="bell"> <img src="./prof/images/cloche.png" alt=""> </div>
    </nav>
    <br>
    <div class="card">
    <div class="card-header">
      
      <!-- START TABS DIV -->
      <div class="tabbable-responsive">
        <div class="tabbable">
          <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">La liste des étudiants sans encadrant</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">La liste des encadrants</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
          <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">
                    <div class="card-content">
                        <div class="table-responsive">
                          <form action="" method="post">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                      <th>Filière</th>
                                      <th>N°APOGEE</th>
                                      <th>Nom et prénom</th>
                                      <th>Sujet du stage</th>
                                      <th>Description du sujet du stage</th>
                                      <th>Technologies utilisées</th>
                                      <th>Choisir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $sql = "SELECT * from etudiant where ISNULL(id_encadrant)=1 and visite=1 order by nom";
                                    $result = mysqli_query($conn,$sql);
                                    $count = 0;
                                    while ($data=mysqli_fetch_assoc($result)) { 
                                      $count++;
                                      if ($count%2 == 0) { ?>
                                        <tr class="even gradeX">
                                          <td class="center"><?php echo $data['filiere']; ?></td>
                                          <td class="center"><?php echo $data['num_appogee']; ?></td>
                                          <td><a href="./prof/profile_etud.php?appog=<?php echo $data['num_appogee']; ?>"><?php echo $data['nom']." ".$data['prenom']; ?></a></td>
                                          <td><?php echo $data['sujet_stage']; ?></td>
                                          <td><?php echo $data['desc_sujet']; ?></td>
                                          <td><?php echo $data['technologies']; ?></td>
                                          <td class="center">
                                            <label for="<?php echo $data['num_appogee'] ?>" class="btn btn-primary" style="color: white; margin: 0 10%;">Encadrer</label>
                                            <input type="submit" class="btn btn-primary" style="display: none" id="<?php echo $data['num_appogee'] ?>" name="encadrer" value="<?php echo $data['num_appogee'] ?>">
                                          </td>
                                        </tr>
                                <?php }else { ?>
                                        <tr class="odd gradeX">
                                          <td class="center"><?php echo $data['filiere']; ?></td>
                                          <td class="center"><?php echo $data['num_appogee']; ?></td>
                                          <td><a href="./prof/profile_etud.php?appog=<?php echo $data['num_appogee']; ?>"><?php echo $data['nom']." ".$data['prenom']; ?></a></td>
                                          <td><?php echo $data['sujet_stage']; ?></td>
                                          <td><?php echo $data['desc_sujet']; ?></td>
                                          <td><?php echo $data['technologies']; ?></td>
                                          <td class="center">
                                            <label for="<?php echo $data['num_appogee'] ?>" class="btn btn-primary" style="color: white; margin: 0 10%;">Encadrer</label>
                                            <input type="submit" class="btn btn-primary" style="display: none" id="<?php echo $data['num_appogee'] ?>" name="encadrer" value="<?php echo $data['num_appogee'] ?>">
                                          </td>
                                        </tr>
                                <?php }
                                    }
                                  ?>
                                </tbody>
                            </table>
                          </form>
                        </div>  
                                  
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
          <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Encadrant</th>
                                        <th>Email de l'encadrant</th>
                                        <th>Etudiants</th>
                                        <th>Filière</th>
                                        <th>Sujet du stage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $sql = "SELECT * from enseignant inner join etudiant on enseignant.id_encadrant=etudiant.id_encadrant order by enseignant.nom_ens";
                                    $result = mysqli_query($conn,$sql);
                                    $count = 0;
                                    $encadrant = -1;
                                    while ($data=mysqli_fetch_assoc($result)) { 
                                      
                                      if ($count%2 == 0) { ?>
                                        <tr class="even gradeX">
                                    <?php if ($data['id_encadrant'] != $encadrant) {
                                            $encadrant = $data['id_encadrant'];
                                            $sql2 = "SELECT * from etudiant where id_encadrant = '".$data['id_encadrant']."'";
                                            $result2 = mysqli_query($conn,$sql2);
                                            $rowspan = mysqli_num_rows($result2); ?>
                                            <td rowspan="<?php echo $rowspan ?>"><?php echo $data['nom_ens']." ".$data['prenom_ens']; ?></td>
                                            <td rowspan="<?php echo $rowspan ?>"><?php echo $data['email_ens']; ?></td>
                                    <?php } ?>
                                          <td><?php echo $data['nom']." ".$data['prenom']; ?></td>
                                          <td class="center"><?php echo $data['filiere']; ?></td>
                                          <td><?php echo $data['sujet_stage']; ?></td>
                                        </tr>
                                <?php }else { ?>
                                        <tr class="odd gradeX">
                                    <?php if ($data['id_encadrant'] != $encadrant) {
                                            $encadrant = $data['id_encadrant'];
                                            $sql2 = "SELECT * from etudiant where id_encadrant = '".$data['id_encadrant']."'";
                                            $result2 = mysqli_query($conn,$sql2);
                                            $rowspan = mysqli_num_rows($result2); ?>
                                            <td rowspan="<?php echo $rowspan ?>"><?php echo $data['nom_ens']." ".$data['prenom_ens']; ?></td>
                                            <td rowspan="<?php echo $rowspan ?>"><?php echo $data['email_ens']; ?></td>
                                    <?php } ?>
                                          <td><?php echo $data['nom']." ".$data['prenom']; ?></td>
                                          <td class="center"><?php echo $data['filiere']; ?></td>
                                          <td><?php echo $data['sujet_stage']; ?></td>
                                        </tr>
                                <?php $count++;
                                      }
                                    }
                                  ?>
                                </tbody>
                            </table>
                        </div>
                                  
                    </div>
                </div>
            </div>
          </div>
        </div>

      </div>      
    </div>
  </div>
  </section>
  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });
  </script>
  <script src="./prof/js/notif.js"></script>
  <!-- DATA TABLE SCRIPTS -->
  <script src="./prof/js/jquery.dataTables.js"></script>
  <script src="./prof/js/dataTables.bootstrap.js"></script>
  <script>
      $(document).ready(function () {
          $('#dataTables-example').dataTable();
      });
  </script>
  <!-- <script src="./prof/js/ajax_script.js"></script> -->
</body>
</html>