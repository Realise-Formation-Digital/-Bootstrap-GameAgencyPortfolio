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
        // Crée ou ouvre un fichier csv
        $file_open = fopen("messages.csv​", "a");
        $no_rows = count(file("messages.csv​"));
        if($no_rows > 1) {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array (
            'sr_no' . ";"  => $no_rows,
            'name' . ";" => $name,
            'email'  . ";" => $email,
            'subject' . ";" => $subject,
            'message' . ";" => $message
        );
        
        // Formate une ligne en csv et l'écrit dans un fichier (donneés formulaire de contact)
        $separator = ";";
        fputcsv($file_open, $form_data, $separator);
        $success = '<label class="text-success">Merci de nous contacter.</label>';
        $name = '';
        $email = '';
        $subject = '';
        $message = '';

        fclose($file_open);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
    <div class="topnav">
        <a class="active" href="index.html">Home</a>
        <a href="news.html" target="news.html">News</a>
        <a href="contact.html">Contact</a>
        <div class="search-container">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#loginModal">Connexion</button>  
        </div>
    </div>
    <div style="padding-left:16px">
    </div>
</nav>
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

    
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
<script src="js/formValidation.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>
</html>