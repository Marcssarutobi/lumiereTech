<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /**
     * Robots gourmands (outils SEO / scraping) : ils consomment la bande passante
     * de l'hébergement mutualisé sans apporter de visiteurs.
     * Les robots des moteurs de recherche (Google, Bing…) ne sont PAS bloqués.
     */
    private const BLOCKED_BOTS = [
        'AhrefsBot',
        'SemrushBot',
        'MJ12bot',
        'DotBot',
        'BLEXBot',
        'PetalBot',
        'DataForSeoBot',
    ];

    /**
     * Sert l'application Vue (SPA) avec les balises SEO propres à chaque URL
     * et un vrai code HTTP 404 pour les pages inexistantes.
     */
    public function spa(Request $request, ?string $any = null)
    {
        $path = '/' . trim($request->path(), '/');

        // Un fichier manquant (image, css, js, map…) ne doit pas renvoyer la page HTML du site
        if (preg_match('/\.[a-z0-9]{2,5}$/i', $path)) {
            abort(404);
        }

        $result = Seo::forPath($path);

        return response()->view('welcome', ['seo' => $result['seo']], $result['status']);
    }

    public function robots(): Response
    {
        $lines = [
            '# robots.txt - ' . config('seo.site_name'),
            'User-agent: *',
            'Allow: /',
            'Disallow: /api/',
            'Disallow: /admins',
            '',
        ];

        foreach (self::BLOCKED_BOTS as $bot) {
            $lines[] = 'User-agent: ' . $bot;
            $lines[] = 'Disallow: /';
            $lines[] = '';
        }

        $lines[] = 'Sitemap: ' . Seo::absoluteUrl('/sitemap.xml');

        return response(implode("\n", $lines) . "\n", 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    public function sitemap(): Response
    {
        $lastmod = config('seo.lastmod');
        $entries = [];

        foreach (config('seo.pages') as $path => $page) {
            if (! ($page['index'] ?? true)) {
                continue;
            }

            $entries[] = [
                'loc' => Seo::absoluteUrl($path),
                'changefreq' => $page['changefreq'] ?? 'monthly',
                'priority' => $page['priority'] ?? '0.5',
                'image' => null,
            ];
        }

        foreach (config('seo.services') as $slug => $service) {
            $entries[] = [
                'loc' => Seo::absoluteUrl('/service/' . $slug),
                'changefreq' => 'monthly',
                'priority' => '0.8',
                'image' => ['loc' => Seo::absoluteUrl($service['image']), 'title' => $service['title']],
            ];
        }

        $e = fn (string $value) => htmlspecialchars($value, ENT_XML1 | ENT_QUOTES, 'UTF-8');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        foreach ($entries as $entry) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . $e($entry['loc']) . "</loc>\n";
            $xml .= '    <lastmod>' . $e($lastmod) . "</lastmod>\n";
            $xml .= '    <changefreq>' . $e($entry['changefreq']) . "</changefreq>\n";
            $xml .= '    <priority>' . $e($entry['priority']) . "</priority>\n";

            if ($entry['image']) {
                $xml .= "    <image:image>\n";
                $xml .= '      <image:loc>' . $e($entry['image']['loc']) . "</image:loc>\n";
                $xml .= '      <image:title>' . $e($entry['image']['title']) . "</image:title>\n";
                $xml .= "    </image:image>\n";
            }

            $xml .= "  </url>\n";
        }

        $xml .= "</urlset>\n";

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
