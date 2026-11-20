<template lang="html">

    <!-- Inner Banner -->
    <div class="inner-banner" :style="{ backgroundImage: 'linear-gradient(rgba(7, 11, 59, .46), rgba(7, 11, 59, .46)), url(' + bannerImage + ')' }">
        <div class="container">
            <div class="inner-title text-center">
                <h3>A propos de nous</h3>
                <ul>
                    <li>
                        <RouterLink to="/">Accueil</RouterLink>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li>A propos</li>
                </ul>
            </div>
        </div>
        <div class="inner-shape">
            <img src="assets/images/shape/inner-shape.png" alt="Images">
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- About Area -->
    <div class="about-area pt-100 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-play">
                        <img src="assets/images/about/about-img1.jpg" alt="About Images">

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content ml-25">
                        <div class="section-title">
                            <span class="sp-color2">15 Years of Experience</span>
                            <h2>Notre Histoire</h2>
                            <p style="text-align: justify;">
                                <strong>LUMIÈRE TECHNOLOGIE & EXPERTISE</strong> est née de la vision d'ingénieurs expérimentés
                                en réseaux télécoms, déterminés à offrir aux entreprises ivoiriennes un <strong>interlocuteur
                                    unique et fiable</strong> pour tous leurs besoins technologiques.
                            </p>
                            <p style="text-align: justify;">
                                Face à la fragmentation du marché des services IT et télécoms, nous avons créé une
                                structure capable d'accompagner nos clients de la conception à la maintenance, en
                                passant par l'installation et le support technique.
                            </p>
                        </div>

                        <p class="about-content-text" style="text-align: justify;">
                            Aujourd'hui, nous sommes fiers de compter parmi nos références des acteurs majeurs
                            comme <strong>Camusat CI, Kaydan Technology et Decathlon</strong>, et de contribuer au
                            développement digital de la Côte d'Ivoire et de l'Afrique de l'Ouest.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- FAQ Area -->
    <div class="faq-area pt-2 pb-5">
        <div class="container">

            <div class="row pt-45">
                <div class="col-lg-6">
                    <div class="faq-content">
                        <div class="faq-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)" style="height: 65px;">
                                        <i class='bx bx-plus'></i>
                                        Notre Vision
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            <strong>
                                                Devenir une référence incontournable en solutions technologiques, télécoms et
                                                énergétiques en Côte d'Ivoire et en Afrique de l'Ouest.
                                            </strong> <br> <br>
                                            Nous aspirons à être le partenaire privilégié des entreprises qui cherchent à innover,
                                            sécuriser leurs infrastructures et optimiser leurs performances grâce à des solutions
                                            technologiques de pointe.
                                        </p>
                                    </div>
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)" style="height: 65px;">
                                        <i class='bx bx-plus'></i>
                                        Notre Équipe
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            Notre force réside dans notre <strong>équipe pluridisciplinaire</strong> composée de :
                                        </p>
                                        <ul class="mb-1">
                                            <li>
                                                <span class="fw-bold">Ingénieurs spécialisés en réseaux et télécoms </span>
                                            </li>
                                            <li>
                                                <span class="fw-bold">Techniciens supérieurs certifiés </span>
                                            </li>
                                            <li>
                                                <span class="fw-bold">Experts en sécurité électronique et énergie </span>
                                            </li>
                                        </ul>
                                        <p>
                                            Tous partagent la même exigence : <strong>l'excellence technique au service de votre
                                                performance. </strong>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="faq-content">
                        <div class="faq-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)" style="height: 65px;">
                                        <i class='bx bx-plus'></i>
                                        Notre Mission
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            <strong>Fournir des solutions fiables, innovantes et parfaitement adaptées</strong> dans les
                                            domaines des réseaux, télécommunications, sécurité électronique et énergie. <br>
                                            Nous nous engageons à :
                                        </p>
                                        <ul class="mb-1">
                                            <li>
                                                <span class="fw-bold">Comprendre en profondeur les besoins spécifiques de chaque client </span>
                                            </li>
                                            <li>
                                                <span class="fw-bold">Proposer des solutions sur mesure, évolutives et durables </span>
                                            </li>
                                            <li>
                                                <span class="fw-bold">Garantir une exécution rapide, professionnelle et conforme aux normes internationales </span>
                                            </li>
                                            <li>
                                                <span class="fw-bold">Assurer un support réactif et un service après-vente de qualité </span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)" style="height: 65px;">
                                        <i class='bx bx-plus'></i>
                                        Notre Politique Qualité
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            Nous orientons chacune de nos actions autour de <strong>5 axes fondamentaux</strong> :
                                        </p>
                                        <ol class="mb-1">
                                            <li>
                                                <span class=""><strong>Compréhension du besoin client</strong> – Diagnostic précis et écoute attentive </span>
                                            </li>
                                            <li>
                                                <span class=""><strong>Maîtrise technique</strong> – Expertise certifiée et respect des normes en vigueur </span>
                                            </li>
                                            <li>
                                                <span class=""><strong>Matériels de qualité</strong> – Sélection rigoureuse de nos fournisseurs et produits </span>
                                            </li>
                                            <li>
                                                <span class=""><strong>Conformité légale</strong> – Respect des exigences légales, réglementaires et
                                                    contractuelles </span>
                                            </li>
                                            <li>
                                                <span class=""><strong>Amélioration continue</strong> – Formation permanente de nos équipes et optimisation
                                                    de nos processus  </span>
                                            </li>
                                        </ol>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Area End -->

    <!-- Choose Area -->
    <div class="choose-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="choose-content mr-20">
                        <div class="section-title mb-4">
                            <span class="sp-color1">Notre Engagement </span>
                            <h2 class="mb-3">Votre succès technologique est notre mission.</h2>
                            <p style="text-align: justify;">
                                Chez <strong>LUMIÈRE TECHNOLOGIE & EXPERTISE</strong>, chaque projet est une opportunité de
                                démontrer notre savoir-faire et de bâtir une relation de confiance durable. Que vous
                                soyez une PME, une grande entreprise ou une institution, nous mettons la même
                                énergie et le même professionnalisme à votre service.
                            </p>
                        </div>
                        <div class="banner-btn">
                            <RouterLink to="/services" class="default-btn btn-bg-two ">Nos Services</RouterLink>
                            <RouterLink to="/demande" class="default-btn btn-bg-one ml-20 text-dark">Demander un service</RouterLink>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="choose-img">
                        <img src="assets/images/about-img3.jpg" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Choose Area End -->


    <!-- Security Area -->
    <div class="security-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Nos Valeurs</span>
                <h2>Les principes qui guident notre excellence</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-4 col-sm-6">
                    <div class="security-card">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>Expertise</h3>
                        <p>Maîtrise technique pointue et formation continue des équipes</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="security-card">
                        <i class="fas fa-award"></i>
                        <h3>Qualité</h3>
                        <p>Respect des normes strictes et contrôle rigoureux constant</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="security-card">
                        <i class="fas fa-lightbulb"></i>
                        <h3>Innovation</h3>
                        <p>Veille technologique permanente et solutions performantes</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="security-card">
                        <i class="fas fa-bolt"></i>
                        <h3>Réactivité</h3>
                        <p>Intervention rapide et disponibilité pour urgences 24/7</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="security-card">
                        <i class="fas fa-heart"></i>
                        <h3>Satisfaction client</h3>
                        <p>Écoute active, transparence totale et dépassement attentes</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="security-card">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Éthique</h3>
                        <p>Intégrité professionnelle absolue et confidentialité totale</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Security Area End -->

    <!-- Counter Area -->
    <div class="counter-area pb-5">
        <div class="container">

            <div class="row pt-45">
                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-another-content p-0 d-flex flex-column align-items-center justify-content-center">
                        <h1>+ 1 400</h1>
                        <span>Installations FTTH réalisées</span>
                    </div>
                </div>

                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-another-content p-0 d-flex flex-column align-items-center justify-content-center">
                        <h1>+ 50</h1>
                        <span>Clients entreprises satisfaits </span>
                    </div>
                </div>

                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-another-content p-0 d-flex flex-column align-items-center justify-content-center">
                        <h1>6</h1>
                        <span>Domaines d'expertise </span>
                    </div>
                </div>

                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-another-content p-0 d-flex flex-column align-items-center justify-content-center">
                        <h1>100%</h1>
                        <span>Engagement qualité</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="counter-shape">
            <div class="shape1">
                <img src="assets/images/shape/shape1.png" alt="Images">
            </div>
            <div class="shape2">
                <img src="assets/images/shape/shape2.png" alt="Images">
            </div>
        </div>
    </div>
    <!-- Counter Area End -->





</template>

<script setup>
import bannerImage from '../../../../images/about.jpg'
</script>
<style>

</style>
