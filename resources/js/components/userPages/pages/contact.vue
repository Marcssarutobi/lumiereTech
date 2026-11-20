<template>

    <!-- Inner Banner -->
    <div class="inner-banner" :style="{ backgroundImage: 'linear-gradient(rgba(7, 11, 59, .46), rgba(7, 11, 59, .46)), url(' + bannerImage + ')' }">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Nous Contactez</h3>
                <ul>
                    <li>
                        <RouterLink to="/">Accueil</RouterLink>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
        <div class="inner-shape">
            <img src="assets/images/shape/inner-shape.png" alt="Images">
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Contact Form Area -->
    <div class="contact-form-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Nous serions ravis de vous lire !</h2>
            </div>

            <div class="row pt-45">
                <div class="col-lg-4">
                    <div class="contact-info mr-20">
                        <span>Informations de Contact</span>
                        <h2>Entrons en Contact</h2>
                        <p style="text-align: justify;">Vous avez des questions ? Notre équipe est à votre écoute pour répondre à toutes vos demandes et vous accompagner efficacement.</p>
                        <ul>
                            <li>
                                <div class="content">
                                    <i class='bx bx-phone-call'></i>
                                    <h3>Téléphone</h3>
                                    <a href="tel:+2250153859393">+225 015 385 9393</a>
                                </div>
                            </li>

                            <li>
                                <div class="content">
                                    <i class='bx bxs-map'></i>
                                    <h3>Adresse</h3>
                                    <span>Cocody Angré caféier 4villa 508</span>
                                </div>
                            </li>

                            <li>
                                <div class="content">
                                    <i class='bx bx-envelope'></i>
                                    <h3>Adresse Email</h3>
                                    <a href="mailto:lumtechnologieexpertise@gmail.com"><span >lumtechnologieexpertise@gmail.com</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="contactForm" @submit.prevent="SendContactFunction">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Votre Nom complet <span>*</span></label>
                                        <input type="text" name="name" v-model="data.name" id="name" class="form-control" required data-error="Veuillez entrer votre nom complet" placeholder="Nom complet">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Votre Adresse Email <span>*</span></label>
                                        <input type="email" name="email" v-model="data.email" id="email" class="form-control" required data-error="Veuillez entrer votre email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numéro de Téléphone <span>*</span></label>
                                        <input type="text" name="phone_number" v-model="data.phone" id="phone_number" required data-error="Veuillez entrer votre numéro de téléphone" class="form-control" placeholder="Numéro de Téléphone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Votre Sujet <span>*</span></label>
                                        <input type="text" name="msg_subject" v-model="data.sujet" id="msg_subject" class="form-control" required data-error="Veuillez entrer votre sujet" placeholder="Votre Sujet">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Votre Message <span>*</span></label>
                                        <textarea name="message" class="form-control" v-model="data.message" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Votre Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>



                                <div class="col-lg-12 col-md-12 text-center mb-3">
                                    <button type="submit" class="default-btn btn-bg-two border-radius-50" :disabled="isLoader" @click.prevent="SendContactFunction">
                                        {{ isLoader ? 'Envoi en cours...' : 'Envoyer le Message' }} <i class='bx bx-chevron-right'></i>
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
    <!-- Contact Form Area End -->

    <!-- Map Area -->
    <div class="map-area">
        <div class="container-fluid m-0 p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4711.6492799679545!2d-3.98823212432273!3d5.407834635120414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc193f88bf4b3b3%3A0x77b79e78dc1f7c5c!2sLUMIERE%20TECHNOLOGIE%20ET%20EXPERTISE!5e1!3m2!1sfr!2sus!4v1772094601245!5m2!1sfr!2sus" height="450" ></iframe>
        </div>
    </div>
    <!-- Map Area End -->

</template>

<script setup>
import bannerImage from '../../../../images/contact.jpg'
import axios from 'axios';
import { ref } from 'vue';


    const data = ref({
        name: '',
        email: '',
        phone: '',
        sujet: '',
        message: '',
    });

    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const alertMsg = ref('')
    const alertClass = ref('')

    async function SendContactFunction() {
        for (const field in data.value) {
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Veuillez remplir ce champ`
        }
        const allEmpty = Object.values(isEmpty.value).every(value => value === false)
        if (allEmpty){
            try {
                isLoader.value = true
                const res = await axios.post('/api/contact', data.value)
                if (res.status === 200) {
                    isLoader.value = false
                    alertMsg.value = 'Votre message a été envoyé avec succès !'
                    alertClass.value = 'alert-success'
                    data.value = {
                        name: '',
                        email: '',
                        phone: '',
                        sujet: '',
                        message: '',
                    }
                }
            } catch (error) {
                isLoader.value = false
                alertMsg.value = 'Une erreur est survenue lors de l\'envoi du message.'
                alertClass.value = 'alert-danger'
            }
        }
    }

</script>
: '',
<style scoped>

</style>
