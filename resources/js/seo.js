/**
 * Met à jour title / description / canonical / Open Graph à chaque navigation
 * dans l'application. Les données viennent de config/seo.php (via window.__SEO__,
 * injecté par resources/views/welcome.blade.php).
 * Au premier chargement, le serveur envoie déjà les bonnes balises : ce script
 * garde simplement l'onglet et les partages cohérents ensuite.
 */
function setMeta(attr, key, value) {
    let el = document.head.querySelector(`meta[${attr}="${key}"]`)
    if (!el) {
        el = document.createElement('meta')
        el.setAttribute(attr, key)
        document.head.appendChild(el)
    }
    el.setAttribute('content', value)
}

function setCanonical(url) {
    let el = document.head.querySelector('link[rel="canonical"]')
    if (!el) {
        el = document.createElement('link')
        el.setAttribute('rel', 'canonical')
        document.head.appendChild(el)
    }
    el.setAttribute('href', url)
}

export function applySeo(to) {
    const data = window.__SEO__
    if (!data) return

    const path = '/' + to.path.replace(/^\/+|\/+$/g, '').toLowerCase()
    let meta = data.pages[path] || null

    if (!meta) {
        const match = path.match(/^\/service\/([^/]+)$/)
        meta = match ? data.services[match[1]] : null
    }

    const isKnown = Boolean(meta)
    meta = meta || data.notFound
    const canonical = data.siteUrl + (path === '/' ? '/' : path)

    document.title = meta.title
    setMeta('name', 'description', meta.description)
    setMeta('name', 'robots', meta.robots)
    setMeta('name', 'googlebot', meta.robots)
    setMeta('property', 'og:title', meta.title)
    setMeta('property', 'og:description', meta.description)
    setMeta('name', 'twitter:title', meta.title)
    setMeta('name', 'twitter:description', meta.description)

    if (isKnown) {
        setCanonical(canonical)
        setMeta('property', 'og:url', canonical)
    }
}
