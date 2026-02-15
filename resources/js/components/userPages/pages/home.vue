<template>

    <!-- Banner Area -->
    <div class="banner-slider-area">
        <div class="banner-slider owl-carousel owl-theme">
            <div class="banner-item item-bg1">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-item-content">
                                <span>LUMIÈRE TECHNOLOGIE & EXPERTISE </span>
                                <h1>Votre partenaire en solutions numériques</h1>
                                <p>
                                    LUMIÈRE TECHNOLOGIE & EXPERTISE accompagne les entreprises dans leur 
                                    transformation digitale avec des solutions fiables, innovantes et sur mesure. De l'étude 
                                    à la maintenance, nous sommes votre interlocuteur unique pour tous vos projets 
                                    technologiques. 
                                </p>
                                <div class="banner-btn">
                                    <RouterLink to="/services" class="default-btn btn-bg-two ">Nos Services</RouterLink>
                                    <RouterLink to="/demande" class="default-btn btn-bg-one text-dark ml-20">Demander un service</RouterLink>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- About Area -->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="about-content mr-20">
                        <div class="section-title">
                            <span class="sp-color2">A propos de nous</span>
                            <h2 class="mb-3">Pourquoi choisir LUMIÈRE TECHNOLOGIE & EXPERTISE ? </h2>
                            <p class=" text-justify">
                                Créée par des ingénieurs expérimentés en réseaux télécoms, notre entreprise s'est 
                                imposée comme un acteur de référence en Côte d'Ivoire et en Afrique de l'Ouest. 
                                Nous combinons expertise technique pointue, réactivité commerciale et exigence 
                                qualité pour livrer des projets conformes aux normes internationales. 
                            </p>
                            <p class=" text-justify">
                                Notre force ?  <strong>Un accompagnement global :</strong> de l'audit initial à la maintenance 
                                préventive, en passant par la fourniture de matériels et l'installation clé en main. 
                            </p>
                        </div>
                        <div class="banner-btn mt-3">
                            <a href="about.html" class="default-btn btn-bg-two ">En savoir plus</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="assets/images/about/about.png" alt="About Images">
                        <div class="sub-content">
                            <img src="assets/images/about/about-img2.jpg" alt="About Images">
                            <div class="content">
                                <h3>+50</h3>
                                <span>Clients satisfaits</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

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

    <!-- Services Area -->
    <section class="services-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color1">Nos Services</span>
                <h2>Découvrez nos domaines d'expertise </h2>
                <p class="margin-auto">
                    Des solutions complètes et intégrées pour sécuriser, connecter et optimiser votre entreprise  
                </p>
            </div>
            <div class="row pt-45">
                <div v-for="(service,index) in services.slice(0,3)" :key="index" class="col-lg-4 col-sm-6">
                    <div class="services-card">
                        <i :class="service.icon"></i>
                        <h3><RouterLink :to="'/service/'+service.slug">{{service.titre}}</RouterLink></h3>
                        <p style="text-align: justify;">{{service.brefDescription}}</p>
                        <RouterLink :to="'/service/'+service.slug" class="learn-btn">Lire plus <i class='bx bx-chevron-right'></i></RouterLink>
                    </div>
                </div>
            </div>
        </div>

        <div class="service-shape">
            <img src="assets/images/shape/service-shape1.png" alt="Images">
        </div>
    </section>
    <!-- Services Area End -->

    <!-- Work Process Area -->
    <section class="work-process-area pt-100 pb-20">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Nos Atouts</span>
                <h2>Ce qui nous différencie</h2>
            </div>

            <div class="row pt-45">
                <div class="col-lg-4 col-sm-6">
                    <div class="work-process-card">
                        <i class="flaticon-project"></i>
                        <h3>Équipe d'ingénieurs qualifiés </h3>
                        <p>Ingénieurs et techniciens certifiés, maîtrisant les normes et technologies les plus récentes du marché.</p>
                        <div class="number">01</div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="work-process-card">
                        <i class="flaticon-chip"></i>
                        <h3>Intervention rapide garantie </h3>
                        <p>Disponibilité, respect des délais et capacité d’intervention rapide, même en situation d’urgence. </p>
                        <div class="number">02</div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="work-process-card">
                        <i class="flaticon-effective"></i>
                        <h3>Des projets maîtrisés </h3>
                        <p>Conformité aux normes internationales, matériels certifiés et gestion complète du projet, de l’étude à la maintenance. </p>
                        <div class="number">03</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Work Process Area End -->

    <!-- Team Area -->
    <div class="team-area pt-5 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Notre Equipe</span>
                <h2>Une équipe engagée à votre service</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <img src="assets/images/team/team-img1.jpg" alt="Team Images">
                        <ul class="social-link">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/?lang=en" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class='bx bxl-linkedin-square'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                        </ul>
                        <div class="content">
                            <h3>Adam Smith</h3>
                            <span>President & CEO</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <img src="assets/images/team/team-img2.jpg" alt="Team Images">
                        <ul class="social-link">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/?lang=en" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class='bx bxl-linkedin-square'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                        </ul>
                        <div class="content">
                            <h3>Max Angles</h3>
                            <span>Manager</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <img src="assets/images/team/team-img3.jpg" alt="Team Images">
                        <ul class="social-link">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/?lang=en" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class='bx bxl-linkedin-square'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                        </ul>
                        <div class="content">
                            <h3>Park Anderson</h3>
                            <span>Sales Executive</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team Area End -->

    <!-- Call Area -->
    <div class="call-us-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="call-contact">
                        <h3>Prêt à sécuriser et optimiser votre infrastructure ?</h3>
                        <a href="tel:+2290153859393" class="call-btn">+229 015 385 9393 </a>
                        <p>Discutons de votre projet. Notre équipe d'ingénieurs vous accompagne dans la 
                            définition de vos besoins et l'élaboration d'une solution sur mesure. </p>
                        <RouterLink to="/demande" class="default-btn btn-bg-two border-radius-5">Demander un service </RouterLink>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="call-us-img">
                        <img src="assets/images/call-us/call-us-img1.png" alt="Images">
                        <div class="call-shape">
                            <div class="shape1">
                                <img src="assets/images/call-us/call-shap2.png" alt="Images">
                            </div>

                            <div class="shape2 shape2-rs">
                                <img src="assets/images/call-us/call-shap3.png" width="150" alt="Images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call Area End -->

    <!-- Brand Area -->
    <div class="brand-area ptb-100">
        <div class="container">

            <div class="section-title text-center mb-5">
                <span class="sp-color2">Ils nous font confiance </span>
                <h3>Des entreprises de tous secteurs nous confient leurs projets technologiques </h3>
            </div>

            <div class="brand-slider owl-carousel owl-theme">
                <div class="brand-item">
                    <img src="assets/images/brand-logo/1.jpg" class="brand-logo-one" alt="Images">
                    <img src="assets/images/brand-logo/1.jpg" class="brand-logo-two" alt="Images">
                </div>
                <div class="brand-item">
                    <img src="assets/images/brand-logo/2.png" class="brand-logo-one" alt="Images">
                    <img src="assets/images/brand-logo/2.png" class="brand-logo-two" alt="Images">
                </div>
                <div class="brand-item">
                    <img src="assets/images/brand-logo/3.png" class="brand-logo-one" alt="Images">
                    <img src="assets/images/brand-logo/3.png" class="brand-logo-two" alt="Images">
                </div>
                <div class="brand-item">
                    <img src="assets/images/brand-logo/4.jpg" class="brand-logo-one" alt="Images">
                    <img src="assets/images/brand-logo/4.jpg" class="brand-logo-two" alt="Images">
                </div>
                <div class="brand-item">
                    <img src="assets/images/brand-logo/7.png" class="brand-logo-one" alt="Images">
                    <img src="assets/images/brand-logo/7.png" class="brand-logo-two" alt="Images">
                </div>
                <div class="brand-item">
                    <img src="assets/images/brand-logo/6.png" class="brand-logo-one" alt="Images">
                    <img src="assets/images/brand-logo/6.png" class="brand-logo-two" alt="Images">
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Area End -->

    



</template>
<script setup>

import { services } from '../../plugins/service';
import { ref, computed } from "vue";

</script>
<style scoped>

    .services-card p {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>