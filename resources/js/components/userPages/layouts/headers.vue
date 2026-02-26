<template>
    
    <!-- Top Header Start -->
    <header class="top-header top-header-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="top-head-left">
                        <div class="top-contact">
                            <h3>Tèl : <a href="tel:+2290153859393">+229 015 385 9393</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="top-header-right d-flex align-items-center justify-content-end w-100">
                        <div class="top-header-social me-5">
                            <ul class="d-flex">
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
                        </div>
                        <div class="language-list">
                            <div class="gtranslate_wrapper " style="margin-top: 13px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Top Header End -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <RouterLink to="/" class="logo">
                <img src="assets/images/logos/logo-3.png" class="logo-one" alt="Logo">
                <img src="assets/images/logos/logo-3.png" class="logo-two" alt="Logo">
            </RouterLink>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <RouterLink class="navbar-brand" to="/">
                        <img src="assets/images/logos/logo-3.png" width="200" class="logo-one" alt="Logo">
                        <img src="assets/images/logos/logo-3.png" class="logo-two" alt="Logo">
                    </RouterLink>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <RouterLink to="/" exact-active-class="active" class="nav-link ">
                                    Accueil 
                                </RouterLink>
                            </li>
                            <li class="nav-item">
                                <RouterLink to="/abouts" exact-active-class="active" class="nav-link">
                                    A propos 
                                </RouterLink>
                            </li>
                            <li class="nav-item">
                                <RouterLink to="/services" exact-active-class="active" class="nav-link">
                                    Services 
                                </RouterLink>
                            </li>

                            <!-- <li class="nav-item">
                                <RouterLink to="/team" exact-active-class="active" class="nav-link">
                                    Equipe
                                </RouterLink>
                            </li> -->

                            <li class="nav-item">
                                <RouterLink to="/contact" exact-active-class="active" class="nav-link">
                                    Contact
                                </RouterLink>
                            </li>
                        </ul>

                        <div class="nav-side d-display">
                            

                            <div class="nav-side-item">
                                <div class="get-btn">
                                    <RouterLink to="/demande" class="default-btn btn-bg-two border-radius-50">Demander un service <i class='bx bx-chevron-right'></i></RouterLink>
                                </div>	
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="side-nav-responsive">
            <div class="container-max">
                <div class="dot-menu">
                    <div class="circle-inner">
                        <div class="in-circle circle-one"></div>
                        <div class="in-circle circle-two"></div>
                        <div class="in-circle circle-three"></div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="side-nav-inner">
                        <div class="side-nav justify-content-center align-items-center">
                            <div class="side-nav-item nav-side">
                                <div class="search-box">
                                    <i class='bx bx-search'></i>
                                </div>
                                <div class="get-btn">
                                    <a href="contact.html" class="default-btn btn-bg-two border-radius-50">Get A Quote <i class='bx bx-chevron-right'></i></a>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

</template>
<script setup>
import { onMounted } from 'vue';


onMounted(()=>{
    // 1️⃣ Définir la configuration globale
  window.gtranslateSettings = {
    default_language: "fr",
    languages: ["fr", "en"],
    wrapper_selector: ".gtranslate_wrapper"
  }

  // 2️⃣ Créer et injecter le script
  const script = document.createElement('script')
  script.src = "https://cdn.gtranslate.net/widgets/latest/dropdown.js"
  script.defer = true

  // Optionnel : quand le script est chargé
  script.onload = () => {
    console.log("GTranslate widget loaded")
  }

  document.body.appendChild(script)
})

</script>
<style>
.gt_selector {
    background: #070B3B;
    color: #fff;
    padding: 8px;
    border: none;
    border-bottom: 1px solid;
}
</style>    