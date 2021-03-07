<!-- INCLUDE HEADER -->
<?php include('header.inc.php'); ?>

<!-- MAIN -->
<main>
    <div class="backgroundMain">
        <div class="secondMain">
            <div class="divWhite container90">
                <section>
                    <!-- ceci est un commentaire -->
                    <h1>
                        <strong class="bold">AlexCraft</strong> est une entreprise spécialisée dans l’<strong class="bold">électricité</strong>, l’<strong class="bold">électronique</strong> et la <strong class="bold">domotique</strong>, domestique ou professionnelle.
                    </h1>

                    <!-- slider -->
                    <div class="owl-carousel owl-theme slider">
                        <img src="/img/home.jpg" alt="photo tv">
                        <img src="/img/smart_home_lights.jpg" alt="photo tv">
                        <img src="/img/smart_home.jpg" alt="photo tv">
                        <img src="/img/tv.jpg" alt="photo tv">
                        <img src="/img/netflix.jpg" alt="photo tv">
                    </div>

                    <p>
                        Avec plus de 10 années d’expérience en entreprise sur des systèmes <strong>électroniques</strong>, <strong>électrotechniques</strong>, et <strong>informatiques</strong>, nous travaillons sur tous types de systèmes, de la Hi-fi à la maison connectée, en passant par l’informatique et la domotique.
                    </p>

                    <p>
                        Une installation performante et adaptée peut vous permettre de faire des gains à l'achat et d’énergie, une sécurité supplémentaire, et un meilleur confort des espaces.
                    </p>

                    <h2>
                        Nos engagements :
                    </h2>

                    <ul class="engagements">
                        <li><img src="/img/medal.png" alt="icône de qualité">Qualité premium. <br>
                            <span>Nous ne travaillons qu’avec des fournisseurs et fabricants reconnus, car dans ces domaines, la qualité et la fiabilité sont incontournables. Les installations fournies sont clé-en-main, vous n’avez rien à faire.</span>
                        </li>
                        <li><img src="/img/file.png" alt="icône de devis">Devis fiables. <br>
                            <span>Chez <strong>Alexcraft</strong>, aucune mauvaise surprise après le devis. Chaque heure de travail non effectuée sera déduite de la facture. A l’inverse, chaque heure supplémentaire par rapport au devis initial n’est pas facturée.</span>
                        </li>
                        <li><img src="/img/clock.png" alt="icône de temps, adaptabilité">Adaptabilité. <br>
                            <span>Toujours à votre écoute, nous préparons ensemble l’organisation des chantiers, en fonction de vos contraintes personnelles.</span>
                        </li>
                        <li><img src="/img/information.png" alt="icône d'information, communication'">Suivi et communication. <br>
                            <span>Nous sommes à votre disposition pour vous accompagner au mieux dans vos projets. Nous restons également totalement disponible suite à l’installation, afin de vous aider pas-à-pas dans la prise en main.</span>
                        </li>
                    </ul>

                </section>
            </div>
        </div>
    </div>
    <!-- INCLUDE BUTTON TOP -->
    <?php include('buttonTop.inc.php'); ?>
</main>

<!-- INCLUDE FOOTER -->
<?php include('footer.inc.php'); ?>

 <!-- scripts -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- jquery cdn en premier-->
	<script src="js/owl.carousel.min.js"></script> <!-- js local en second -->
	
	<!-- js script direct en dernier -->
	<script>
	    $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items:1,
				dots :true,
                autoplay :true
			});
        });
	</script>