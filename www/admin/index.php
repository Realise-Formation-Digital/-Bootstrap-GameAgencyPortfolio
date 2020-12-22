<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADALT Agency</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
    <div class="topnav">
        <a href="../index.php">Home</a>
        <a href="../news.php">News</a>
        <a href="../contact.php">Contact</a>
        <div class="search-container">
        <?php
        if ($_SESSION['logg'] == '') {
          echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#loginModal">Connexion</button>';
        } else {
          echo '<form name="logout" method="GET" action="../logout.php"><input type="submit" value="Se déconnecter" class="btn btn-info"></form>';

        }
        ?>
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
        <div><h1>Administration</h1></div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <h2>Nom</h2>
                    </div>
                    <div class="col-3">
                        <h2>E-mail</h2>
                    </div>
                    <div class="col-3">
                        <h2>Sujet</h2>
                    </div>
                    <div class="col-3">
                        <h2>Message</h2>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
<?php

$row = 1;
if (($handle = fopen("../messages.csv", "r")) !== FALSE) {
   
    echo '<div class="col-12">';
   
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            echo '<div class="row">';
        }else{
            echo '<div class="row">';
        }
       
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
            if(empty($data[$c])) {
               $value = "&nbsp;";
            }else{
               $value = $data[$c];
            }
            if ($row == 1) {
                echo '<div class="col-3"><p>'.$value.'</p></div>';
            }else{
                echo '<div class="col-3"><p>'.$value.'</p></div>';
            }
        }
       
        if ($row == 1) {
            echo '</div>';
        }else{
            echo '</div>';
        }
        $row++;
    }
   
    echo '</div>';
    fclose($handle);
}
?>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function($){
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();
  
  // Account for home page with empty path
  if ( path == '' ) {
    path = 'index.php';
  }
      
  var target = $('nav a[href="'+path+'"]');
  // Add active class to target link
  target.addClass('active');
});
</script>
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