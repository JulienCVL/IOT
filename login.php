<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./login/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://ensa.uit.ac.ma/wp-content/uploads/2019/11/cropped-ensak-logo.png" rel="icon">
</head>
<body>
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
					header("location:index_et.php?etudiant=".$_SESSION['id_user']);
				}else {
					header("location:./etudiant/infos.php");
				}
			}elseif ($_SESSION['type']=="prof") {
				$sql = "SELECT * FROM enseignant WHERE email_ens = '".$login."'";
				$result = mysqli_query($conn,$sql);
				$visite = mysqli_fetch_assoc($result);
				if ($visite['visite']==1) {
					header("location:index_pr.php");
				}else {
					header("location:./prof/change_pass_bra.php");
				}
			}elseif ($_SESSION['type']=="admin") {
				header("location:index_ad.php");
			}
	    }
		if(isset($_POST['login'])) {
            $login = $_POST['login'];
            $password = htmlspecialchars($_POST['password']);
            if (empty($login) || empty($password)) { ?>
				<div class="alert alert-warning alert-dismissible">
    				<button type="button" class="close" data-dismiss="alert">&times;</button>
    				<strong>Warning!</strong> Saisissez votre Login et votre mot de pass !
				</div>
				<img class="wave" src="./login/img/wave2.png">
				<div class="container">
					<div class="img">
						<img src="img/bg.svg">
					</div>
					<div class="login-content">
						<div class="login-child">
							<form action="login.php" method="post">
								<img src="./login/img/avatar1.png">
								<h2 class="title">Welcome</h2>
								   <div class="input-div one">
									  <div class="i">
											  <i class="fas fa-user"></i>
									  </div>
									  <div class="div">
											  <h5>Login</h5>
											  <input type="text" name="login" class="input">
									  </div>
								   </div>
								   <div class="input-div pass">
									  <div class="i"> 
										   <i class="fas fa-lock"></i>
									  </div>
									  <div class="div">
										   <h5>Password</h5>
										   <input type="password" name="password"  class="input">
								   </div>
								</div>
								<a href="#">Forgot Password?</a>
								<input type="submit" class="btn" value="Login">
							</form>
						</div>
					</div>
				</div>
				<script type="text/javascript" src="./login/js/main.js"></script>
		<?php 
        	}else {
				include("connexion.php");
				$requette = "SELECT * FROM etudiant WHERE email = '".$login."' AND password = '".$password."'";
            	$result = mysqli_query($conn,$requette);
            	$row = mysqli_fetch_assoc($result);
				if ($row!=False) {
					$_SESSION['id_user'] = $row['num_appogee'];
            	    $_SESSION['login'] = $row['email'];
            	    $_SESSION['nom'] = $row['nom'];
					$_SESSION['filiere'] = $row['filiere'];
            	    $_SESSION['prenom'] = $row['prenom'];
            	    $_SESSION['photo'] = $row['photo'];
					$_SESSION['type'] = "student";
					$_SESSION['visite'] = $row['visite'];
					if ($row['visite']==1) {
						header("location: index_et.php?etudiant=".$_SESSION['id_user']);
					}else {
						header("location:./etudiant/infos.php");
					}
				}else {
					$requette = "SELECT * FROM enseignant WHERE email_ens = '".$login."' AND password = '".$password."'";
            		$result = mysqli_query($conn,$requette);
            		$row = mysqli_fetch_assoc($result);
					if ($row!=False) {
						$_SESSION['id_user'] = $row['id_encadrant'];
						$_SESSION['login'] = $row['email_ens'];
						$_SESSION['nom'] = $row['nom_ens'];
						$_SESSION['prenom'] = $row['prenom_ens'];
						$_SESSION['photo'] = $row['photo'];
						$_SESSION['type'] = "prof";
						$_SESSION['visite'] = $row['visite'];
						if ($row['visite']==1) {
							header("location:index_pr.php");
						}else {
							header("location:./prof/change_pass_bra.php");
						}
					}else {
						$requette = "SELECT * FROM admin WHERE login = '".$login."' AND password = '".$password."'";
            			$result = mysqli_query($conn,$requette);
            			$row = mysqli_fetch_assoc($result);
						if ($row!=False) {
							$_SESSION['login'] = $row['login'];
							$_SESSION['type'] = "admin";
							header("location:index_ad.php");
						}else {?>
							<div class="alert alert-danger alert-dismissible">
    							<button type="button" class="close" data-dismiss="alert">&times;</button>
    							<strong>Warning!</strong> Login ou mot de passe incorrectes ! 
							</div>
							<img class="wave" src="./login/img/wave2.png">
							<div class="container">
								<div class="img">
									<img src="./login/img/bg.svg">
								</div>
								<div class="login-content">
									<div class="login-child">
										<form action="login.php" method="post">
											<img src="./login/img/avatar1.png">
											<h2 class="title">Welcome</h2>
											   <div class="input-div one">
												  <div class="i">
														  <i class="fas fa-user"></i>
												  </div>
												  <div class="div">
														  <h5>Login</h5>
														  <input type="text" name="login" class="input">
												  </div>
											   </div>
											   <div class="input-div pass">
												  <div class="i"> 
													   <i class="fas fa-lock"></i>
												  </div>
												  <div class="div">
													   <h5>Password</h5>
													   <input type="password" name="password"  class="input">
											   </div>
											</div>
											<a href="#">Forgot Password?</a>
											<input type="submit" class="btn" value="Login">
										</form>
									</div>
								</div>
							</div>
							<script type="text/javascript" src="./login/js/main.js"></script>
				<?php	}
					}
				}
			}
		}else {?>
			<img class="wave" src="./login/img/wave2.png">
			<div class="container">
				<div class="img">
					<img src="./login/img/bg.svg">
				</div>
				<div class="login-content">
					<div class="login-child">
						<form action="login.php" method="post">
							<img src="./login/img/avatar1.png">
							<h2 class="title">Welcome</h2>
							   <div class="input-div one">
								  <div class="i">
										  <i class="fas fa-user"></i>
								  </div>
								  <div class="div">
										  <h5>Login</h5>
										  <input type="text" name="login" class="input">
								  </div>
							   </div>
							   <div class="input-div pass">
								  <div class="i"> 
									   <i class="fas fa-lock"></i>
								  </div>
								  <div class="div">
									   <h5>Password</h5>
									   <input type="password" name="password"  class="input">
							   </div>
							</div>
							<a href="#">Forgot Password?</a>
							<input type="submit" class="btn" value="Login">
						</form>
					</div>
				</div>
			</div>
			<script type="text/javascript" src="./login/js/main.js"></script>
<?php	} ?>
</body>
</html>