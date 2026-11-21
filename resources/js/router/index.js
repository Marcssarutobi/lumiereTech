import { createRouter, createWebHistory } from "vue-router";
import { applySeo } from "../seo";

const routes =[
    {
        path: '/',
        component: ()=>import('../components/userPages/layouts/contentWrapper.vue'),
        children: [
            {
                path:'',
                component: ()=>import('../components/userPages/pages/home.vue'),
            },
            {
                path:'abouts',
                component: ()=>import('../components/userPages/pages/about.vue'),
            },
            {
                path:'services',
                component: ()=>import('../components/userPages/pages/service.vue'),
            },
            {
                path:'service/:slug',
                component: ()=>import('../components/userPages/pages/details.vue'),
            },
            {
                path:'demande',
                component: ()=>import('../components/userPages/pages/demande.vue'),
            },
            {
                path:'team',
                component: ()=>import('../components/userPages/pages/team.vue'),
            },
            {
                path:'contact',
                component: ()=>import('../components/userPages/pages/contact.vue'),
            },
            {
                // Toute autre URL : page 404 personnalisée (le menu et le pied de page restent affichés)
                path:':pathMatch(.*)*',
                name:'not-found',
                component: ()=>import('../components/userPages/pages/notFound.vue'),
            },
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth',
                top: 0
            }
        } else {
            return { top: 0 }
        }
    }
})

router.afterEach(applySeo)

export default router;