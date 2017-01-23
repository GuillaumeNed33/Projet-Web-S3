<?php include("header.php"); ?>
<main class="container">
    <div class="row">
        <h1 class="text-center" style="margin-bottom: 75px;">À propos</h1>
        <div class="contact col-lg-5">
            <div class="col-lg-4">
                <img src="img/thomas.jpg" alt="photo"/>
            </div>
            <div class="col-lg-8">
                <p><b>Thomas BLANC</b> </br>
                    Etudiant en 2e année à l'IUT Informatique de Bordeaux </br>
                    thomas.blanc@etu.u-bordeaux.fr
                </p>
            </div>
        </div>
        <div class="contact col-lg-offset-2 col-lg-5">
            <div class="col-lg-4">
                <img src="img/guillaume.jpg" alt="photo"/>
            </div>
            <div class="col-lg-8">
                <p> <b>Guillaume NEDELEC</b> </br>
                    Etudiant en 2e année à l'IUT Informatique de Bordeaux </br>
                    guillaume.nedelec@etu.u-bordeaux.fr
                </p>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="row presentation">
        <p class="text-center">
            Ce site de e-commerce a été développé dans le cadre du projet de programmation web à l'IUT Inforamtique de Bordeaux.
            <br><br>
            Nous avons choisi de développer ce site en PHP sans Framework pour des raisons de rapidité. Nous ne voulions pas perdre du temps avec Symfony
            ou le déploiement est long et compliqué. De plus nous sommes plus à l'aise avec le PHP qu'avec l'ASP.NET, d'où le choix de cette technologie.
            <br><br>
            Le projet comprend toutes les fonctionnalités demandées et possède quelques suppléments en Javascript pour améliorer l'ergonomie côté client.
            Nous avons utilisé l'API d'Amazon afin de récupérer le prix des albums ainsi que le lien du produit sur leur site.
            <br><br>
            Nous avons rencontrées quelques difficultés au début de l'Utilisation de l'API au niveau de l'inscription et de l'exploitation des données mais ces derniers ont été réglés rapidement.
        </p>
    </div>
</main>
<?php include("footer.php"); ?>
