<?php

session_start();

$success = '';
$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

// Supprime les espaces, antislashs d'une chaîne, Convertit les caractères spéciaux en entités HTML

function clean_text($string) {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

// Détermine si une variable est déclarée et est différente de null

if(isset($_POST["submit"])) {
    if(empty($_POST["name"])) {
        $error .= '<p><label class="text-danger">Entrer votre nom</label></p>';
    }
    // Vérifie que le champs contient seulement des caractères et espaces
    else {
        $name = clean_text($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $error .= '<p><label class="text-danger">Les lettres et les espaces sont uniquement acceptés</label></p>'; 
        }
    }
    if(empty($_POST["email"])) {
        $error .= '<p><label class="text-danger">Entrer votre adresse e-mail</label></p>';
    }
    // Vérifie que l'email est valide
    else {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p><label class="text-danger">Le format du champs e-mail est invalide</label></p>';
        }
    }
    if(empty($_POST["subject"])) {
        $error .= '<p><label class="text-danger">Le champs sujet est requis</label></p>';
    }
    else {
        $subject = clean_text($_POST["subject"]);
    }
    if(empty($_POST["message"])) {
        $error .= '<p><label class="text-danger">Le champs message est requis</label></p>';
    } 
    else {
        $message = clean_text($_POST["message"]);
    }

    
    if($error == '') {

        // Cr�ation d'une table comportant les donn�es envoy�es
		$liste = array($_POST['name'],$_POST['email'],$_POST['subject'], $_POST['message']);
		
		
		//	Ecriture dans le fichier CSV
		$fp = fopen('messages.csv','a+',';');
        fputcsv($fp,$liste,';','"');
        $success = '<label class="text-success">Merci de nous contacter.</label>';
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
                                <form method="post">
                                <h3>Formulaire de contact</h3><br />
                                <?php echo $error; ?>
                                <?php echo $success; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Entrer votre nom</label><input type="text" name="name" placeholder="Entrer votre nom" class="form-control" value="<?php echo $name; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Entrer votre e-mail</label><input type="text" name="email" class="form-control" placeholder="Entrer votre e-mail" value="<?php echo $email; ?>" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                 <label>Entrer le sujet</label><input type="text" name="subject" class="form-control" placeholder="Entrer le sujet" value="<?php echo $subject; ?>" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Entrer votre message</label><textarea name="message" class="form-control" placeholder="Entrer votre message"><?php echo $message; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info" value="Envoyer" />
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
            
<footer>
    <?php include 'footer.php'; ?>
</footer>
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
          <form>
            <div class="form-group">
              <input type="text" class="form-control" name="user" placeholder="Nom d'utilisateur...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pwd" placeholder="Mot de passe...">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round" name="gestion" value="Connexion">Connexion</button>
          </form>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Pas encore membre? <a href="register.php" class="text-info"> S'inscrire</a>.</div>
      </div>
  </div>
</div>
</form>

