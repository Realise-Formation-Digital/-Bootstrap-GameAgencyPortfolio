<?php
session_start();
?>
<?php include('header.php'); ?>
<link rel='stylesheet' type='text/css' href="css/style.php"/>
<section>
    <div class="jumbotron text-center">
        <h1>ADALT Agency</h1>
        <p>Votre Agence de Game développement multisupports</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="public/image/TheLastofUsPartII.jpg" class=" float-left img-thumbnail" alt="lastofus">
            </div>
            <div class="col-sm-4">
                <img src="public/image/adalt.png" class=" float-center img-thumbnail" alt="communaute">
            </div>
            <div class="col-sm-4">
                <img src="public/image/Retimed.jpg" class="float-right img-thumbnail" alt="retimed">
            </div>
        </div>
        <section>
            <div class="container-fluid">
                <div class="bg-danger">
                    <h2 class="titre">Bienvenue</h2>
                    <div class="row">
                        <article class="col-md-4">
                            <h3 class="premiere-ligne">Notre histoire</h3>
                            <p>
                                Fondé en 2020, ADALT est né d'une passion pour les jeux vidéo. Situé au coeur de Genève,
                                notre magasin propose un large catalogue de jeux vidéo. Notre équipe est là pour vous
                                conseiller la quintessence du jeu vidéo pour tous les goûts.
                            </p>
                        </article>

                        <article class="col-md-4">
                            <h3 class="premiere-ligne">Notre mission</h3>
                            <p>
                                En tant qu'Agency Game, nous avons pour mission de créer les meilleurs jeux vidéo de la
                                planète. Nous voulons raconter des histoires époustouflantes à un public mondial sans
                                oublier le soucis du détail qui a fait de nous ce que nous sommes aujourd'hui.
                            </p>
                        </article>
                        <article class="col-md-4">
                            <h3 class="premiere-ligne">Notre équipe</h3>
                            <p>
                                L'Agency Game abrite 5 professionnels de la création de jeux. Nous parlons plusieurs
                                langues différentes mais partageons le même amour pour les jeux vidéo. ADALT est un lieu
                                qui échappe aux limites du développement de jeux et grâce à cette approche, nous vous
                                offrons ce que les autres ne peuvent pas, une opportunité de créer des jeux auxquels
                                vous aimeriez jouer.
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <section>
                                <h1>News</h1>
                                <img src="public/image/twwh2.jpg" alt="Image du jeu The Bridge" width="300px">
                                <p>

                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas maximus velit et
                                    mollis aliquet. Aliquam tempus dui mauris, at sodales massa dignissim sed.
                                    Vestibulum vulputate fringilla ante, eu suscipit ipsum blandit in.
                                    Pellentesque sollicitudin dolor vel justo mollis, iaculis tempor turpis ornare.
                                    Fusce mattis neque auctor leo porttitor laoreet. Maecenas id risus ligula. Vivamus
                                    sapien lacus, molestie nec nibh quis, porttitor rhoncus nisi.</p>
                            </section>
                        </div>
                        <div class="col-sm">
                            <section>
                                <h1>Jobs</h1>
                                <table class="table">
                                    <caption>List of jobs available</caption>

                                    <head>
                                        <tr>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    </label>
                                                </div>
                                            </th>
                                            <th scope="col">Country</th>
                                            <th scope="col">Companies</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" root="grey">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                                        <label class="form-check-label" for="defaultCheck2">
                                                        </label>
                                                    </div>
                                                </th>
                                                <td>USA</td>
                                                <td>Apple Inc, Microsoft</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                                        <label class="form-check-label" for="defaultCheck3">
                                                        </label>
                                                    </div>
                                                </th>
                                                <td>Sweden</td>
                                                <td>IKEA Furnitures, Spotify</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                                        <label class="form-check-label" for="defaultCheck4">
                                                        </label>
                                                    </div>
                                                </th>
                                                <td>Finland</td>
                                                <td>Nokia Communications</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </section>
                        </div>
                        <div class="col-sm">
                            <section>
                                <h1>Community</h1>
                                <h2>Youtube</h2>
                                <h2>Twitch</h2>
                                <h2>Twitter</h2>
                                <h2>Subscribe</h2>
                                <button type="button" class="btn btn-primary btn-lg btn-block">Email</button>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

<?php include 'footer.php'; ?>


