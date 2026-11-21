<template>
    <!-- Page 404 -->
    <section class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="error-content">
                        <img src="assets/images/404-error.jpg" alt="Erreur 404 : page introuvable" style="max-width:100%;height:auto;">
                        <h1 class="h3">Oups ! Cette page est introuvable</h1>
                        <p>
                            La page que vous cherchez n’existe pas, a été déplacée ou son adresse est incorrecte.
                            Retrouvez nos services ou contactez notre équipe, nous serons ravis de vous aider.
                        </p>
                        <div class="d-flex flex-wrap justify-content-center" style="gap: 12px;">
                            <RouterLink to="/" class="default-btn btn-bg-two border-radius-50">Retour à l’accueil</RouterLink>
                            <RouterLink to="/services" class="default-btn btn-bg-one border-radius-50">Voir nos services</RouterLink>
                            <RouterLink to="/contact" class="default-btn btn-bg-one border-radius-50">Nous contacter</RouterLink>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
</script>
