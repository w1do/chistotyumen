// @ts-check
import { defineConfig } from 'astro/config';
import sitemap from '@astrojs/sitemap';

// https://astro.build/config
export default defineConfig({
    site: 'https://chistotyumen.ru',
    server: {
        host: true
    },
    integrations: [
        sitemap({
            changefreq: 'weekly',
            priority: 0.8,
            lastmod: new Date(),
        })
    ]
});
