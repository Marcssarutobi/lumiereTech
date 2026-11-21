<?php

/*
|--------------------------------------------------------------------------
| Configuration SEO
|--------------------------------------------------------------------------
|
| Source unique pour : balises <title>/<meta>, Open Graph, Twitter Cards,
| données structurées JSON-LD, sitemap.xml et robots.txt.
|
| ⚠ Quand vous ajoutez un service dans
|   resources/js/components/plugins/service.js, ajoutez-le aussi dans
|   la section « services » ci-dessous (même slug) pour qu'il apparaisse
|   dans le sitemap et ait ses propres balises meta.
|
*/

return [

    // Domaine public du site : définissez APP_URL=https://votre-domaine.com dans .env
    'site_url' => rtrim(env('APP_URL', 'http://localhost'), '/'),

    'site_name' => 'Lumière Technologie & Expertise',
    'locale' => 'fr_FR',
    'language' => 'fr',

    // Ajouté aux titres quand la longueur totale reste correcte (≤ 68 caractères)
    'title_suffix' => ' | Lumière Technologie & Expertise',

    // Image de partage (Facebook, LinkedIn, WhatsApp…). Idéal : 1200×630 px.
    'og_image' => '/assets/images/home-one/bg_hero.jpg',

    // Date de dernière mise à jour du contenu (utilisée dans sitemap.xml)
    'lastmod' => '2026-11-20',

    'business' => [
        'name' => 'Lumière Technologie & Expertise',
        'legal_name' => 'Lumière Technologie & Expertise',
        'phone' => '+22548371489',
        'email' => 'lumtechnologieexpertise@gmail.com',
        'logo' => '/assets/images/logos/logo-3.png',
        'street' => 'Cocody Angré Cafeier 4, villa 508',
        'city' => 'Abidjan',
        'region' => 'Abidjan',
        'country' => 'CI',
        'latitude' => 5.407834,
        'longitude' => -3.988232,
        'area_served' => ['Côte d’Ivoire', 'Afrique de l’Ouest'],
        // Ajoutez ici vos pages officielles (Facebook, LinkedIn…) : améliore le SEO local
        'same_as' => [],
    ],

    'pages' => [
        '/' => [
            'title' => 'Lumière Technologie & Expertise – Réseaux, Télécoms, Sécurité',
            'description' => 'Réseaux, télécoms, fibre optique, sécurité électronique et énergie : Lumière Technologie & Expertise accompagne les entreprises à Abidjan.',
            'name' => 'Accueil',
            'priority' => '1.0',
            'changefreq' => 'monthly',
            'index' => true,
        ],
        '/abouts' => [
            'title' => 'À propos – Ingénieurs réseaux et télécoms en Côte d’Ivoire',
            'description' => 'Découvrez notre histoire, notre vision, notre mission et notre politique qualité : une équipe d’ingénieurs au service de vos projets technologiques.',
            'name' => 'À propos',
            'priority' => '0.7',
            'changefreq' => 'yearly',
            'index' => true,
        ],
        '/services' => [
            'title' => 'Nos services – Réseaux, sécurité, énergie, informatique',
            'description' => 'Infrastructure réseau, câblage, téléphonie IP, cybersécurité, vidéosurveillance, solaire, GED : toute notre offre pour les entreprises ivoiriennes.',
            'name' => 'Services',
            'priority' => '0.9',
            'changefreq' => 'monthly',
            'index' => true,
        ],
        '/demande' => [
            'title' => 'Demander un service ou un devis',
            'description' => 'Décrivez votre besoin en quelques lignes : notre équipe d’ingénieurs étudie votre demande et vous recontacte dans les plus brefs délais.',
            'name' => 'Demander un service',
            'priority' => '0.8',
            'changefreq' => 'yearly',
            'index' => true,
        ],
        '/contact' => [
            'title' => 'Contact – Cocody Angré, Abidjan',
            'description' => 'Contactez Lumière Technologie & Expertise à Cocody Angré (Abidjan) : téléphone +225 48 37 14 89, e-mail et formulaire. Réponse rapide.',
            'name' => 'Contact',
            'priority' => '0.8',
            'changefreq' => 'yearly',
            'index' => true,
        ],
        // Page non liée dans le menu et encore avec du contenu d'exemple : ni indexée, ni dans le sitemap
        '/team' => [
            'title' => 'Notre équipe',
            'description' => 'Découvrez les membres de notre équipe.',
            'name' => 'Équipe',
            'index' => false,
        ],
    ],

    'services' => [
        'infrastructure-reseaux-telecoms' => [
            'title' => 'Infrastructure Réseaux & Télécoms',
            'description' => 'Conception, déploiement et maintenance d’infrastructures réseaux et télécoms : câblage structuré, fibre optique, réseaux LAN/MAN, interconnexion de sites et téléphonie IP.',
            'image' => '/img/1-1.jpg',
        ],
        'cablage-structure-vdi-fibre' => [
            'title' => 'Câblage Structuré',
            'description' => 'Déploiement architectures VDI conformes ISO/IEC 11801 : câbles Cat 5e à Cat 7, fibre optique, tests certification et documentation technique complète.',
            'image' => '/img/1-2.jpg',
        ],
        'telephonie-entreprise-pabx-ipbx' => [
            'title' => 'Téléphonie Entreprise',
            'description' => 'Solutions téléphoniques IP performantes et économiques : installation PABX/IPBX, téléphonie IP, construction lignes et maintenance complète.',
            'image' => '/img/1-4.jpg',
        ],
        'genie-civil-reseaux' => [
            'title' => 'Génie Civil Réseaux',
            'description' => 'Travaux génie civil infrastructures télécoms extérieures : terrassement, canalisations, chambres tirage, raccordements et signalisation sécurité.',
            'image' => '/img/1-5.jpg',
        ],
        'informatique-systemes-serveurs' => [
            'title' => 'Informatique Systèmes & Serveurs',
            'description' => 'Administration, sécurisation et optimisation des systèmes informatiques : serveurs Windows/Linux, virtualisation, cybersécurité, sauvegarde et supervision.',
            'image' => '/img/1-6.jpg',
        ],
        'securite-informatique' => [
            'title' => 'Sécurité Informatique',
            'description' => 'Cybersécurité et défense en profondeur : audit sécurité, pare-feu, VPN, antivirus EDR, sensibilisation et conformité réglementaire RGPD.',
            'image' => '/img/1-8.jpg',
        ],
        'hotspot-wifi-professionnel' => [
            'title' => 'Hotspot Wi-Fi Pro',
            'description' => 'Solutions Wi-Fi entreprise sécurisées : étude couverture, portail captif personnalisé, gestion accès, analytique fréquentation et conformité légale.',
            'image' => '/img/1-9.jpg',
        ],
        'videosurveillance-controle-acces' => [
            'title' => 'Vidéosurveillance & Contrôle d’Accès',
            'description' => 'Solutions complètes de sécurité électronique : vidéosurveillance HD/IP, contrôle d’accès et supervision à distance pour la protection de vos sites.',
            'image' => '/img/1-10.jpg',
        ],
        'controle-acces' => [
            'title' => 'Contrôle Accès',
            'description' => 'Gérez flux personnes locaux avec solutions électroniques : badges RFID, biométrie, serrures électriques, interphonie et gestion centralisée droits.',
            'image' => '/img/1-12.jpg',
        ],
        'electricite-solutions-energetiques' => [
            'title' => 'Solutions Énergétiques',
            'description' => 'Autonomie et continuité énergétique avec solutions complètes : groupes électrogènes, solaire photovoltaïque et installations électriques conformes aux normes.',
            'image' => '/img/1-13.jpg',
        ],
        'ged-archivage-electronique' => [
            'title' => 'Gestion électronique de documents (GED) et archivage électronique',
            'description' => 'Dématérialisation, classement, recherche et archivage sécurisé de vos documents pour simplifier leur gestion et leur accès au quotidien.',
            'image' => '/img/1-17.jpg',
        ],
    ],
];
