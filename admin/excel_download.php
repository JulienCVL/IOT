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
    $filename = "affichage.xls";
    // Download file
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");
    $sql10 = "SELECT etudiant.num_appogee as 'N°APOGEE', etudiant.nom as 'Nom', etudiant.prenom as 'Prenom', etudiant.filiere as 'Filiere', etudiant.sujet_stage as 'Sujet du stage', enseignant.nom_ens as 'Nom de l`ecadrant', enseignant.prenom_ens as 'Prenom de l`encadrant', etudiant.note as 'Note /20' from etudiant inner join enseignant on etudiant.id_encadrant=enseignant.id_encadrant where etudiant.note > 0 order by etudiant.nom;";
    $result10 = mysqli_query($conn, $sql10);
    // Write data to file
    $flag = false;
    while ($row10 = mysqli_fetch_assoc($result10)) {
        if (!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row10)) . "\r\n";
            $flag = true;
        }
        echo implode("\t", array_values($row10)) . "\r\n";
    }
  ?>