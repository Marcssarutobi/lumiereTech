<template>

    <!-- Inner Banner -->
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Demander un service</h3>
                <ul>
                    <li>
                        <RouterLink to="/">Accueil</RouterLink>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li>Demander un service</li>
                </ul>
            </div>
        </div>
        <div class="inner-shape">
            <img src="assets/images/shape/inner-shape.png" alt="Images">
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Service Request Form Area -->
    <div class="contact-form-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center d-flex flex-column align-items-center">
                <h2>Remplissez votre demande de service</h2>
                <p class="w-100">Complétez ce formulaire pour nous soumettre votre demande de service. Notre équipe examinera votre demande et vous contactera dans les plus brefs délais.</p>
            </div>

            <div class="row pt-45">
                <div class="col-lg-4">
                    <div class="contact-info mr-20">
                        <span>Information Importante</span>
                        <h2>Comment ça marche ?</h2>
                        <p>Soumettre une demande de service est simple et rapide. Remplissez le formulaire avec vos informations et détails du service souhaité.</p>
                        <ul>
                            <li>
                                <div class="content">
                                    <i class='bx bx-clipboard'></i>
                                    <h3>Étape 1</h3> 
                                    <span>Remplissez le formulaire avec vos détails</span>
                                </div>
                            </li>

                            <li>
                                <div class="content">
                                    <i class='bx bx-check-circle'></i>
                                    <h3>Étape 2</h3> 
                                    <span>Nous vérifions votre demande</span>
                                </div>
                            </li>

                            <li>
                                <div class="content">
                                    <i class='bx bx-phone-call'></i>
                                    <h3>Étape 3</h3>
                                    <span>Nous vous contactons pour confirmer</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="serviceRequestForm" @submit.prevent="SendDemandeFunction">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Votre Nom <span>*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" v-model="data.name" required data-error="Veuillez entrer votre nom" placeholder="Nom complet">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Votre Email <span>*</span></label>
                                        <input type="email" name="email" id="email" v-model="data.email" class="form-control" required data-error="Veuillez entrer votre email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numéro de Téléphone <span>*</span></label>
                                        <input type="text" name="phone_number" id="phone_number" v-model="data.phone" required data-error="Veuillez entrer votre numéro" class="form-control" placeholder="Téléphone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Type de Service <span>*</span></label>
                                        <select name="" v-model="data.service" id="" class="form-control" required>
                                            <option value="">-- Sélectionnez un service --</option>
                                            <option v-for="(service, index) in services" :key="index" :value="service.slug">{{ service.titre }}</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom de l'Entreprise</label>
                                        <input type="text" name="company_name" v-model="data.entreprise" id="company_name" class="form-control" placeholder="Nom de votre entreprise">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Domaine d'Activité</label>
                                        <input type="text" name="industry" v-model="data.activite" id="industry" class="form-control" placeholder="Ex: E-commerce, Finance...">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Détails de votre demande <span>*</span></label>
                                        <textarea name="message" class="form-control" id="message" v-model="data.message" maxlength="1000" cols="30" rows="8" required data-error="Veuillez décrire votre demande" placeholder="Décrivez en détail votre besoin..."></textarea>
                                        <div class="w-100 text-end">
                                            <span class=" text-muted">{{ data.message.length }}/1000</span>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                               

                                <div class="col-lg-12 col-md-12 text-center mb-3">
                                    <button type="submit" class="default-btn btn-bg-two border-radius-50" :disabled="isLoader">
                                        {{ isLoader ? 'Envoi en cours...' : 'Soumettre ma demande' }} <i class='bx bx-chevron-right'></i>
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>

                                 <div class=" alert" :class="alertClass">{{ alertMsg }}</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Request Form Area End -->

</template>
<script setup>

    import { onMounted, ref } from 'vue';
    import { services } from '../../plugins/service';
    import { useRoute } from 'vue-router'
import axios from 'axios';

    const route = useRoute()

    const data = ref({
        name: '',
        email: '',
        phone: '',
        service: '',
        entreprise: '',
        activite: '',
        message: '',
    })
    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const alertMsg = ref('')
    const alertClass = ref('')

    const getServiceTitle = (slug) => {
        const service = services.find(s => s.slug === slug)
        return service ? service.titre : ''
    }

    async function SendDemandeFunction() {

        data.value.service = getServiceTitle(data.value.service)

        for (const field in data.value) {
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Veuillez remplir ce champ`
        }
        const allEmpty = Object.values(isEmpty.value).every(value => value === false)
        if (allEmpty) {
            isLoader.value = true
            try {
                const res = await axios.post('/api/demande', data.value)
                if (res.status === 200) {
                    isLoader.value = false
                    for (const field in data.value) {
                        data.value[field] = ''
                    }
                    alertMsg.value = 'Demande envoyée avec succès !'
                    alertClass.value = 'alert-success'
                }
            } catch (error) {
                isLoader.value = false
                alertMsg.value = 'Erreur lors de l\'envoi de la demande.'
                alertClass.value = 'alert-danger'
            }
        }
    }

    onMounted(()=>{
        if (route.query.service) {
            data.value.service = route.query.service
        }
    })

</script>