<template>

     <!-- Inner Banner -->
     <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>{{ service.titre }}</h3>
                <ul>
                    <li>
                        <RouterLink to="/">Accueil</RouterLink>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
        <div class="inner-shape">
            <img src="assets/images/shape/inner-shape.png" alt="Images">
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-article">
                        <div class="service-article-img">
                            <img :src="service.image" alt="Images">
                        </div>
                        <div class="service-article-content">
                            <h2>{{ service.titre }}</h2>
                            <p style="text-align: justify;" v-html="formattedDescription"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="side-bar-area">
                        <div class="side-bar-widget mb-4">
                            <h3 class="title">Autre Services</h3>
                            <div class="side-bar-categories">
                                <ul>
                                    <li v-for="(other,index) in autresServices" :key="index">
                                        <div class="line-circle"></div>
                                        <RouterLink :to="'/service/'+other.slug">{{other.titre}}</RouterLink>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="side-bar-widget mt-4">
                            <div class="work-process-left p-5">
                                <div class="section-title">
                                    <span class="sp-color1">Chaque projet est unique.</span>
                                    <h2>Obtenez votre devis personnalisé en quelques clics</h2>
                                </div>
                                <a href="contact.html" class="default-btn btn-bg-two border-radius-50 text-center">Demander un service</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Details Area End -->

</template>
<script setup>

    import { services } from '../../plugins/service';
    import { ref, computed } from "vue";
    import { useRoute } from 'vue-router'

    const route = useRoute()
  
    // Trouve le service par son slug
    const service = computed(() => {
        return services.find(s => s.slug === route.params.slug)
    })

    // Formate la description avec des paragraphes
    const formattedDescription = computed(() => {
        if (!service.value) return ''
        return service.value.description.replace(/\n/g, '<br>')
    })

    // Extrait les features de la description (lignes commençant par •)
    const extractFeatures = computed(() => {
        if (!service.value) return []
        const lines = service.value.description.split('\n')
        return lines
        .filter(line => line.trim().startsWith('•'))
        .map(line => line.replace('•', '').trim())
    })

    const autresServices = computed(() => {
        return services
        .filter(s => s.slug !== route.params.slug)  // Exclure le service actuel
        .slice(0, 6)  // Prendre les 6 premiers
    })

</script>
<style>

</style>