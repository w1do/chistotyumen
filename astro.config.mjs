// @ts-check
import { defineConfig } from 'astro/config';
import sitemap from '@astrojs/sitemap';
import node from '@astrojs/node';

// https://astro.build/config
export default defineConfig({
    site: 'https://chistotyumen.ru',
    server: {
        host: true
    },
    adapter: node({
        mode: 'standalone',
    }),
    integrations: [
        sitemap({
            changefreq: 'weekly',
            priority: 0.8,
            lastmod: new Date(),
        })
    ]
});
