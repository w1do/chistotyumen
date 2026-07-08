// Content Collections: посты-продолжения кластерных запросов.
// Каждый пост лежит в src/content/posts/<cluster>/<slug>.md и привязан к кластеру
// полем `cluster` (совпадает с папкой в src/pages). URL поста: /<cluster>/<slug>.
import { defineCollection, z } from 'astro:content';
import { glob } from 'astro/loaders';

const uslugi = defineCollection({
  loader: glob({ pattern: '**/*.md', base: './src/content/uslugi' }),
  schema: z.object({
    // Макет детальной страницы поста (см. src/layouts/PostLayout.astro).
    layout: z.string().default('../../layouts/PostLayout.astro'),
    // Кластер, к которому относится пост (slug папки в src/pages).
    cluster: z.string(),
    // SEO-заголовок и мета-описание детальной страницы.
    title: z.string(),
    description: z.string(),
    // Краткий анонс для карточки в списке постов.
    excerpt: z.string(),
    // Подпись даты/времени чтения в карточке (как в макете блога).
    dateLabel: z.string().default('Читать'),
    author: z.string().default('Пора Чистить'),
    // Путь к изображению относительно src/assets/images (без ведущего /images).
    imagePath: z.string(),
    imageAlt: z.string(),
    // Порядок вывода в списке (по возрастанию).
    order: z.number().default(0),
    // --- Необязательные поля для блоков макета service-details.html ---
    // Позволяют переопределить текст/изображения в конкретном посте.
    // Если не заданы — используются тематические значения по умолчанию
    // из src/layouts/PostLayout.astro.
    contentTitle: z.string().optional(),
    features: z.array(z.string()).optional(),
    image2: z.string().optional(),
    image2Alt: z.string().optional(),
    image3: z.string().optional(),
    image3Alt: z.string().optional(),
    paragraph2: z.string().optional(),
    stats: z
      .array(
        z.object({
          value: z.number(),
          title: z.string(),
          desc: z.string(),
        }),
      )
      .optional(),
    faqTitle: z.string().optional(),
    faqIntro: z.string().optional(),
    faqs: z
      .array(
        z.object({
          q: z.string(),
          a: z.string(),
        }),
      )
      .optional(),
  }),
});

const posts = defineCollection({
  loader: glob({ pattern: '**/*.md', base: './src/content/posts' }),
  schema: z.object({
    title: z.string(),
    description: z.string(),
    excerpt: z.string(),
    date: z.string().optional(),
    author: z.string().default('Пора Чистить'),
    imagePath: z.string(),
    imageAlt: z.string(),
    cluster: z.string().optional(), // Опционально, если хотим привязывать к кластеру
    tags: z.array(z.string()).optional(),
  }),
});

export const collections = { uslugi, posts };
