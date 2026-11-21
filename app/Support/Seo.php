<?php

namespace App\Support;

use Illuminate\Support\Str;

/**
 * Résout les balises SEO (title, description, canonical, JSON-LD…) pour une URL du site.
 * Les données viennent de config/seo.php.
 */
class Seo
{
    /**
     * @return array{status:int, seo:array}
     */
    public static function forPath(string $path): array
    {
        $key = '/' . strtolower(trim($path, '/'));
        $pages = config('seo.pages');
        $services = config('seo.services');

        if (isset($pages[$key])) {
            $page = $pages[$key];

            return [
                'status' => 200,
                'seo' => self::build(
                    $key,
                    $page['title'],
                    $page['description'],
                    $page['index'] ?? true,
                    $key === '/' ? [] : [[$page['name'] ?? $page['title'], $key]],
                    null,
                ),
            ];
        }

        if (preg_match('#^/service/([^/]+)$#', $key, $m) && isset($services[$m[1]])) {
            $service = $services[$m[1]];

            return [
                'status' => 200,
                'seo' => self::build(
                    $key,
                    $service['title'] . ' à Abidjan',
                    $service['description'],
                    true,
                    [
                        [$pages['/services']['name'], '/services'],
                        [$service['title'], $key],
                    ],
                    $service,
                ),
            ];
        }

        return [
            'status' => 404,
            'seo' => self::build(
                '/404',
                'Page introuvable',
                'La page que vous cherchez n’existe pas ou a été déplacée. Retrouvez nos services ou contactez-nous.',
                false,
                [],
                null,
            ),
        ];
    }

    /**
     * Données SEO exposées au JavaScript (window.__SEO__) pour mettre à jour
     * title / description / canonical lors de la navigation dans la SPA.
     */
    public static function clientData(): array
    {
        $pages = [];
        foreach (config('seo.pages') as $path => $page) {
            $seo = self::forPath($path)['seo'];
            $pages[$path] = ['title' => $seo['title'], 'description' => $seo['description'], 'robots' => $seo['robots']];
        }

        $services = [];
        foreach (config('seo.services') as $slug => $service) {
            $seo = self::forPath('/service/' . $slug)['seo'];
            $services[$slug] = ['title' => $seo['title'], 'description' => $seo['description'], 'robots' => $seo['robots']];
        }

        $notFound = self::forPath('/page-introuvable-404')['seo'];

        return [
            'siteUrl' => config('seo.site_url'),
            'pages' => $pages,
            'services' => $services,
            'notFound' => ['title' => $notFound['title'], 'description' => $notFound['description'], 'robots' => $notFound['robots']],
        ];
    }

    public static function absoluteUrl(string $path): string
    {
        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        return config('seo.site_url') . '/' . ltrim($path, '/');
    }

    public static function title(string $base): string
    {
        $suffix = config('seo.title_suffix');

        return mb_strlen($base . $suffix) <= 68 ? $base . $suffix : $base;
    }

    private static function build(string $path, string $title, string $description, bool $index, array $breadcrumb, ?array $service): array
    {
        $canonical = self::absoluteUrl($path === '/' ? '/' : $path);
        // Le titre de l'accueil contient déjà le nom de marque
        $fullTitle = $path === '/' ? $title : self::title($title);
        $description = Str::limit(trim($description), 158, '…');
        $image = $service['image'] ?? config('seo.og_image');

        return [
            'title' => $fullTitle,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => $index
                ? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'
                : 'noindex, nofollow',
            'index' => $index,
            'og_image' => self::absoluteUrl($image),
            'site_name' => config('seo.site_name'),
            'locale' => config('seo.locale'),
            'schema' => $index ? self::schema($canonical, $fullTitle, $description, $breadcrumb, $service) : [],
        ];
    }

    private static function schema(string $canonical, string $title, string $description, array $breadcrumb, ?array $service): array
    {
        $site = config('seo.site_url');
        $b = config('seo.business');
        $orgId = $site . '/#organization';

        $graph = [
            [
                '@type' => ['LocalBusiness', 'ProfessionalService'],
                '@id' => $orgId,
                'name' => $b['name'],
                'legalName' => $b['legal_name'],
                'url' => $site . '/',
                'logo' => self::absoluteUrl($b['logo']),
                'image' => self::absoluteUrl(config('seo.og_image')),
                'description' => config('seo.pages')['/']['description'],
                'telephone' => $b['phone'],
                'email' => $b['email'],
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => $b['street'],
                    'addressLocality' => $b['city'],
                    'addressRegion' => $b['region'],
                    'addressCountry' => $b['country'],
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => $b['latitude'],
                    'longitude' => $b['longitude'],
                ],
                'areaServed' => $b['area_served'],
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'telephone' => $b['phone'],
                    'email' => $b['email'],
                    'contactType' => 'customer service',
                    'areaServed' => $b['country'],
                    'availableLanguage' => ['fr'],
                ],
            ],
            [
                '@type' => 'WebSite',
                '@id' => $site . '/#website',
                'url' => $site . '/',
                'name' => config('seo.site_name'),
                'inLanguage' => config('seo.language'),
                'publisher' => ['@id' => $orgId],
            ],
            [
                '@type' => 'WebPage',
                '@id' => $canonical . '#webpage',
                'url' => $canonical,
                'name' => $title,
                'description' => $description,
                'inLanguage' => config('seo.language'),
                'isPartOf' => ['@id' => $site . '/#website'],
                'about' => ['@id' => $orgId],
            ],
        ];

        if (! empty($b['same_as'])) {
            $graph[0]['sameAs'] = array_values($b['same_as']);
        }

        if ($breadcrumb) {
            $items = [[
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Accueil',
                'item' => $site . '/',
            ]];
            foreach ($breadcrumb as $i => [$name, $url]) {
                $items[] = [
                    '@type' => 'ListItem',
                    'position' => $i + 2,
                    'name' => $name,
                    'item' => self::absoluteUrl($url),
                ];
            }
            $graph[] = ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
        }

        if ($service) {
            $graph[] = [
                '@type' => 'Service',
                'name' => $service['title'],
                'description' => $service['description'],
                'serviceType' => $service['title'],
                'image' => self::absoluteUrl($service['image']),
                'provider' => ['@id' => $orgId],
                'areaServed' => $b['area_served'],
                'url' => $canonical,
            ];
        }

        return ['@context' => 'https://schema.org', '@graph' => $graph];
    }
}
