<template lang="html">

    <!-- Inner Banner -->
    <div class="inner-banner" :style="{ backgroundImage: 'linear-gradient(rgba(7, 11, 59, .46), rgba(7, 11, 59, .46)), url(' + bannerImage + ')' }">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Nos Services</h3>
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

    <!-- Services Style Area -->
    <section class="services-style-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Nos Services</span>
                <h1>Découvrez nos services</h1>
                <p class="margin-auto" style="text-align: justify;">
                    Chez <strong>LUMIÈRE TECHNOLOGIE & EXPERTISE</strong>, nous accompagnons les entreprises
                    dans leur transformation digitale et leur sécurisation grâce à une offre complète et
                    intégrée. De l'infrastructure réseau à l'énergie, en passant par la sécurité électronique
                    et l'informatique, nous sommes votre partenaire unique pour tous vos projets
                    technologiques.
                </p>
            </div>
            <div class="row pt-45">
                <div v-for="(service,index) in servicesPagines" :key="index" class="col-lg-4 col-sm-6">
                    <div class="services-card services-style-bg">
                        <i :class="service.icon"></i>
                        <h3 class="service-title"><RouterLink :to="'/service/'+service.slug">{{service.titre}}</RouterLink></h3>
                        <p style="text-align: justify;">{{service.brefDescription}}</p>
                        <RouterLink :to="'/service/'+service.slug" class="learn-btn">Lire plus <i class='bx bx-chevron-right'></i></RouterLink>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 text-center">
                    <div class="pagination-area">
                        <!-- Précédent -->
                        <a
                            href="#"
                            class="prev page-numbers"
                            :class="{ disabled: pageCourante === 1 }"
                            @click.prevent="pagePrecedente"
                        >
                            <i class='bx bx-left-arrow-alt'></i>
                        </a>

                        <!-- Numéros de page -->
                        <template v-for="page in pagesVisibles" :key="page">
                            <span
                                v-if="page === pageCourante"
                                class="page-numbers current"
                                aria-current="page"
                            >
                                {{ page }}
                            </span>
                            <a
                                v-else
                                href="#"
                                class="page-numbers"
                                @click.prevent="allerAPage(page)"
                            >
                                {{ page }}
                            </a>
                        </template>

                        <!-- Suivant -->
                        <a
                            href="#"
                            class="next page-numbers"
                            :class="{ disabled: pageCourante === totalPages }"
                            @click.prevent="pageSuivante"
                        >
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Style Area End -->

</template>
<script setup>
    import bannerImage from '../../../../images/service.jpg'
    import { services } from '../../plugins/service';
    import { ref, computed } from "vue";

    const pageCourante = ref(1)
    const itemsParPage = 9

    const totalPages = computed(() => Math.ceil(services.length / itemsParPage))

    const servicesPagines = computed(() => {
        const debut = (pageCourante.value - 1) * itemsParPage
        return services.slice(debut, debut + itemsParPage)
    })

    // Génère les numéros de page à afficher
    const pagesVisibles = computed(() => {
        const pages = []
        for (let i = 1; i <= totalPages.value; i++) {
            pages.push(i)
        }
        return pages
    })

    const pageSuivante = () => {
        if (pageCourante.value < totalPages.value) {
            pageCourante.value++
        }
    }

    const pagePrecedente = () => {
        if (pageCourante.value > 1) {
            pageCourante.value--
        }
    }

    const allerAPage = (page) => {
        pageCourante.value = page
    }
</script>
<style scoped>
.services-card p{
    display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
.services-card .service-title{
    display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
