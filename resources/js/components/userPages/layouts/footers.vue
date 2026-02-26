<template>
    
    <!-- Footer Area End -->
    <footer class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top pt-100 pb-70">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="assets/images/logos/logo-4.png" width="200" alt="Images">
                                </a>
                            </div>
                            <p>
                                Nous accompagnons les entreprises dans leur 
                                    transformation digitale avec des solutions fiables, innovantes et sur mesure.
                            </p>
                            <div class="footer-call-content">
                                <h3>Nous contacté</h3>
                                <span><a href="tel:+2250153859393">+225 015 385 9393</a></span>
                                <i class='bx bx-headphone'></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="footer-widget pl-5">
                            <h3>Liens rapide</h3>
                            <ul class="footer-list">
                                <li>
                                    <RouterLink to="/" >
                                        <i class='bx bx-chevron-right'></i>
                                        Accueil
                                    </RouterLink>
                                </li>
                                <li>
                                    <RouterLink to="/abouts" >
                                        <i class='bx bx-chevron-right'></i>
                                        A propos
                                    </RouterLink>
                                </li>
                                <li>
                                    <RouterLink to="/services" >
                                        <i class='bx bx-chevron-right'></i>
                                        Services
                                    </RouterLink>
                                </li>
                                <li>
                                    <RouterLink to="/contact" >
                                        <i class='bx bx-chevron-right'></i>
                                        Contact
                                    </RouterLink>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget pl-2">
                            <h3>Services</h3>
                            <ul class="footer-list">
                                <li v-for="(service,index) in services.slice(0,6)" :key="index">
                                    <RouterLink :to="'/service/'+service.slug">
                                        <i class='bx bx-chevron-right'></i>
                                        {{service.titre}}
                                    </RouterLink>
                                </li> 
                            </ul>
                        </div>
                    </div>

                    

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <h3>Adresse</h3>
                            <ul class="footer-lists">
                                <li>
                                    <i class='bx bx-map'></i>
                                    <span>Cocody Angré caféier 4villa 508</span>
                                </li>
                                <li>
                                    <i class='bx bx-envelope'></i>
                                    <span>lumtechnologieexpertise@gmail.com</span>
                                </li>
                                <li>
                                    <i class='bx bx-phone-call'></i>
                                    <span>+225 015 385 9393</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copy-right-area">
                <div class="copy-right-text">
                    <p>
                        Copyright © 2026 - {{ new Date().getFullYear() }} Lumière Technologie & Expertise. Tous droits réservés.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

</template>
<script setup>
    import { services } from '../../plugins/service';
</script>
<style scoped>
    .footer-lists{
        padding: 0;
    }
    .footer-lists li{
        display: flex;
        align-items: center;
        color: #fff;
        gap: 15px;
        margin-bottom: 10px;
    }
    .footer-lists li i {
        font-size: 22px;
        color: #fff;
    }
</style>    