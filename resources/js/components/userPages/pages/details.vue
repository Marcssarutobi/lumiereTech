<template>
    <!-- Service inconnu : page 404 -->
    <NotFound v-if="!service" />
    <template v-else>

     <!-- Inner Banner -->
     <div class="inner-banner" :style="{ backgroundImage: 'linear-gradient(rgba(7, 11, 59, .46), rgba(7, 11, 59, .46)), url(' + bannerImage + ')' }">
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
            <img src="assets/images/shape/inner-shape.png" alt="" aria-hidden="true">
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
                            <img :src="service.image" :alt="service.titre" loading="lazy" decoding="async">
                        </div>
                        <div class="service-article-content">
                            <h2>{{ service.titre }}</h2>
                            <p style="text-align: justify;" v-html="formattedDescription"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="side-bar-area">
                        <div class="side-bar-widget p-3 mb-4">
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
                                <RouterLink :to="{ path: '/demande', query: { service: service.slug } }" class="default-btn btn-bg-two border-radius-50 text-center">Demander un service</RouterLink>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Details Area End -->

    </template>
</template>
<script setup>

    import bannerImage from '../../../../images/bg_hero.jpg'
    import { services } from '../../plugins/service';
    import NotFound from './notFound.vue';
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

        return service.value.description
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\n/g, '<br>')
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
