<?php

session_start();

$_SESSION['logg'] = '';



//	Initialisation des variables
$error = array();
$user = '';
$email = '';




if ((isSet($_POST['gestion'])) && ($_POST['gestion'] == 'Connexion')) {
	
	
	//	Controle que les champs ont bien été renseignés
	if ($_POST['user'] == '') { $error[] = 'Votre nom d&rsquo;utilisateur est vide'; }
	if ($_POST['pwd'] == '') { $error[] = 'Votre mot de passe est vide'; }
	
	
	
	if (count($error) == 0) {
		
		//	 Conversion du MDP crypté
		$mdp = md5($_POST['pwd']);
		
		
		
		if (file_exists('users.csv')) {
			$fp = fopen('users.csv','r');
			while (($data = fgetcsv($fp)) !== FALSE) {
				
				$row = explode(';',$data[0]);
				if (($row[0] == $_POST['user']) && ($row[2] == $mdp)) {
					
					$user = $row[0];
					$email = $row[1];
					$_SESSION['logg'] = array(
																	'user' 		=> $user,
																	'email' 		=> $email
										);
					break;
				}
			}
			fclose($fp);
		} else { $error[] = 'Impossible de trouver la base de donn&eacute;es'; }
		
	}
	
}



?>
<?php include('header.php');?>
<section>
    <div class="jumbotron text-center">
        <h1>ADALT Agency</h1>
        <p>Votre Agence de Game développement multisupports</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <form method="post">
                                <h3>Login</h3><br />
                                <?php
                                //	Affichage des erreurs de contrôle
                                if (count($error) > 0) { for ($i = 0; $i < count($error); $i++) { echo $error[$i].'<br />'; } }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Entrer votre nom d'utilisateur</label><input type="text" name="user" placeholder="Entrer votre nom" class="form-control" value="<?php echo $user; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Entrer votre mot de passe</label><input type="password" name="pwd" class="form-control" placeholder="Mot de passe" value="<?php echo $pwd; ?>" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <input type="submit" name="gestion" value="Connexion" class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                    if ($_SESSION['logg'] == '') {
                        echo '&bull;&nbsp;Vous n&rsquo;&ecirc;tes pas connect&eacute;&nbsp;!';
                    } else {
                        echo 'Connect&eacute;&nbsp;:&nbsp;&nbsp;'.$_SESSION['logg']['user'].' - '.$_SESSION['logg']['email'];
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</section>

<!-- Modal Login-->
<form name="login" method="POST" action="login.php">
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="d-flex flex-column text-center">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user" placeholder="Nom d'utilisateur...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" placeholder="Mot de passe...">
                            </div>
                            <button type="submit" class="btn btn-info btn-block btn-round" name="gestion" value="Connexion">Connexion</button>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="signup-section">Pas encore membre? <a href="register.php" class="text-info"> S'inscrire</a>.</div>
                </div>
            </div>                  
        </div>
    </div>
</form>

    
<?php include('footer.php');?>