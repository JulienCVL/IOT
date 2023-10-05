<?php
    session_start();
    include "./connexion.php";
    if (isset($_SESSION['login'])) {
        $visite = $_SESSION['visite'];
        if ($_SESSION['type']=="student") {
            if ($visite==0) {
                header("location:./etudiant/infos.php");
            }
        }elseif ($_SESSION['type']=="prof" || $_SESSION['type']=="admin") {
            header("location:./403.php");
        }
    }else {
        header("location:./login.php");
    }
    //infos stage
    $requette = "SELECT * FROM etudiant WHERE num_appogee = '".$_SESSION['id_user']."'";
    $result = mysqli_query($conn,$requette);
    $row = mysqli_fetch_assoc($result);
    if ($row!=False) {
        $sujet_stage= $row['sujet_stage'];
        $desc_sujet = $row['desc_sujet'];
        $technologies = $row['technologies'];
        $binome = $row['binome'];
    }else{
        header("LOCATION:./403.php");
    }

//infos entreprise
    $requette1 = "SELECT * FROM infos_entreprise WHERE num_appogee = '".$_SESSION['id_user']."'";
    $result1 = mysqli_query($conn,$requette1);
    $row1 = mysqli_fetch_assoc($result1);
    if ($row1!=False) {
        $nom_entrep= $row1['nom_entrep'];
        $adresse_entre = $row1['adresse_entre'];
        $tel_entre = $row1['tel_entre'];
        $ville = $row1['ville'];
    }else {
        $nom_entrep= "";
        $adresse_entre = "";
        $tel_entre = "";
        $ville = "";
    }

//infos encadrant entreprise
    $requette2 = "SELECT * FROM encadrant_entre WHERE num_appogee = '".$_SESSION['id_user']."'";
    $result2 = mysqli_query($conn,$requette2);
    $row2 = mysqli_fetch_assoc($result2);
    if ($row2 != False) {
        $email_encadrant_entre= $row2['email_encadrant_entre'];
        $nom_enc = $row2['nom_enc'];
        $prenom = $row2['prenom_enc'];
        $tel_encadrant_entre = $row2['tel_encadrant_entre'];
    }else {
        $email_encadrant_entre= "";
        $nom_enc = "";
        $prenom = "";
        $tel_encadrant_entre = "";
    }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    <link rel="stylesheet" href="./etudiant/css/styleet.css">
    <link rel="stylesheet" href="./etudiant/css/profile_etud.css">
    <title>Informations personnelles</title>
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
                <a href="#">
                    <i class='bx bx-file'></i>
                    <span class="link_name">Infos</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Infos</a></li>
                </ul>
            </li>
            <li>
                <a href="etudiant/depot.php">
                    <i class='bx bx-import'></i>
                    <span class="link_name">Depot</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Depot</a></li>
                </ul>
            </li>
            <li>
                <a href="etudiant/settings.php">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Settings</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Settings</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src= "<?php echo "./etudiant/et_files/images_profile/".$_SESSION['photo'];?>" alt="">
                    </div>
                    <div class="name-job">
                        <?php 
                            $req1 = "SELECT * from etudiant where num_appogee = '".$_SESSION['id_user']."'";
                            $res1 = mysqli_query($conn,$req1);
                            $name = mysqli_fetch_assoc($res1);
                        ?>
                        <div class="profile_name"><?php echo $name['prenom']." ".$name['nom'] ?></div>
                        <div class="job">Student profil</div>
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
            <div class="logo"><img src="./etudiant/images/ENSA-KENITRA.png" alt="Ensa kenitra"
                    style="width: 140px; height: 60px;">
            </div>
            <div class="icon" id="bell"> <img src="etudiant/images/cloche.png" alt=""> </div>
        </nav>
        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <a href="#" id="pop">
                                <img id="imageresource" src="<?php echo "./etudiant/et_files/images_profile/".$_SESSION['photo'];?>" style="width: 180px; height: 180px;">
                            </a>

                            <!-- Creates the bootstrap modal where the image will appear -->
                            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span
                                                    class="sr-only">Close</span></button>

                                        </div>
                                        <div class="modal-body">
                                            <img src="" id="imagepreview" style="width: 264px; height: 264px;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                <?php echo "<span>".$_SESSION['nom']." ".$_SESSION['prenom']."</span>"; ?>
                            </h5>
                            <h6>
                                <?php echo "<span>".$_SESSION['filiere']."</span>"; ?>
                            </h6>
                            <div class="send_encad">
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">sujet de stage</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">entreprise</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Informations personnelles</p>
                            <ul class="info_pers">
                                <li>Numero appogee:
                                    <?php echo "<span>".$_SESSION['id_user']."</span>" ?>
                                </li>
                                <li>nom:
                                    <?php echo "<span>".$_SESSION['nom']."</span>" ?>
                                </li>
                                <li>Prenom:
                                    <?php echo "<span>".$_SESSION['prenom']."</span>" ?>
                                </li>
                                <li>email:
                                    <?php echo "<span>".$_SESSION['login']."</span>" ?>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Intitulé du sujet</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$sujet_stage."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Description du sujet</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$desc_sujet."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Les technologies utilisées</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$technologies."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>binome</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$binome."</span>" ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>nom</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$nom_entrep."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>adresse</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$adresse_entre."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>tel</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$tel_entre."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Ville</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$ville."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Nom de l'encadrant dans l'entreprise</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$nom_enc."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Prenom de l'encadrant</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$prenom."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Email de l'encadrant</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$email_encadrant_entre."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Tel de l'encadrant</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php echo "<span>".$tel_encadrant_entre."</span>" ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

            </form>
            <a href="./etudiant/modifier_infos.php" class="button3">Modifier</a>
        </div>
    </section>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
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
    <script src="./etudiant/js/notif.js"></script>
    <script src="./etudiant/js/profile_etud.js"></script>
</body>
</html>