<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADALT Agency</title>
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
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="contact.php">Contact</a>
        <div class="search-container">
        <?php
        if ($_SESSION['logg'] == '') {
          echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#loginModal">Connexion</button>';
        } else {
          echo '<form name="logout" method="GET" action="logout.php"><input type="submit" value="Se déconnecter" class="btn btn-info"></form>';

        }
        ?>
        </div>
    </div>
    <div style="padding-left:16px">
    </div>
</nav>