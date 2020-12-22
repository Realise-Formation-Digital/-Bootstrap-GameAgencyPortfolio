<?php

session_start();


//	Initialisation des variables
$error = array();
$success = '';
$user = '';
$email = '';
$password1 = '';
$password2 = '';
$mdpMin = 6;




if ((isSet($_POST['gestion'])) && ($_POST['gestion'] == 'Envoyer')) {
	
	
	//	Controle que le champ a bien �t� renseign�
	if ($_POST['user'] == '') { $error[] = 'Votre nom d&rsquo;utilisateur est vide'; }
	if ($_POST['email'] == '') { $error[] = 'Vous devez sp&eacute;cifier votre email'; }
	if ($_POST['password1'] == '') { $error[] = 'Mot de passe 1 vide'; }
	if ($_POST['password2'] == '') { $error[] = 'Mot de passe 2 vide'; }
	
	// Controle de la validit� de l'email
	if (preg_match_all('/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,9}/',$_POST['email'],$tblSortie) == 0) {
		$error[] = 'Votre adresse email comporte des erreurs';
	}
	
	//	Control du mot de passe
	if (strlen($_POST['password1']) < $mdpMin) { $error[] = 'Votre mot de passe doit contenir plus de '.$mdpMin.' caract&egrave;res pour que votre inscription soit valide!'; }
	if ($_POST['password1'] != $_POST['password2']) { $error[] = 'Vos deux mots de passe sp&eacute;cifi&eacute; ne sont pas identiques'; }
	
	
	
	//	Recherche si le "user" est d�j� utilis�
	$find = 0;
	if (file_exists('users.csv')) {
		$fp = fopen('users.csv','r');
		while (($data = fgetcsv($fp)) !== FALSE) {
			$row = explode(';',$data[0]);
			if ($row[0] == $_POST['user']) { $find++; }
		} fclose($fp);
	}
	if ($find > 0) { $error[] = 'Utilisateur existe d&eacute;j&agrave;...'; }
	
	
	
	
	
	
	// Enregistrement des donn�es
	if (count($error) == 0) {
		
		
		//	Conversion des donn�es
		$mdp = md5($_POST['password1']);
		
		// Cr�ation d'une table comportant les donn�es envoy�es
		$liste = array($_POST['user'],$_POST['email'],$mdp);
		
		
		//	Ecriture dans le fichier CSV
		$fp = fopen('users.csv','a+',';');
        fputcsv($fp,$liste,';','"');
        $success = '<label class="text-success">Inscription réussie</label>';
		fclose($fp);
		
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
                                <form method="POST">
                                <h3>Inscription</h3><br />
                                <?php
                                //	Affichage des erreurs de contr�le
                                if (count($error) > 0) { for ($i = 0; $i < count($error); $i++) { echo $error[$i].'<br />'; } }
                                ?>
                                <?php echo $success; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Entrer votre nom d'utilisateur </label><input type="text" name="user" placeholder="Entrer votre nom" class="form-control" value="<?php if (isSet($_POST['user']) && ($_POST['user'] != '')) { echo $_POST['user']; } ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Entrer votre e-mail </label><input type="text" name="email" class="form-control" placeholder="Entrer votre e-mail" value="<?php if (isSet($_POST['email']) && ($_POST['email'] != '')) { echo $_POST['email']; } ?>" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                 <label>Entrer votre mot de passe (6 caractères minimum) </label><input class="form-control" type="password" name="password1" value="" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Confirmer votre mot de passe </label><input class="form-control" type="password" name="password2" value="">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" name="gestion" class="btn btn-info" value="Envoyer" />
                            </div>
                        </div>
                    </div>
                    <br>
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