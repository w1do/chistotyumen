// Резолвинг локальных изображений для компонента <Image /> из astro:assets.
// Изображения лежат в src/assets/images (копии из public/images), что позволяет
// Astro оптимизировать их и добавлять loading="lazy" / decoding="async".
import type { ImageMetadata } from 'astro';

const modules = import.meta.glob<{ default: ImageMetadata }>(
  '/src/assets/images/**/*.{jpeg,jpg,png,gif,svg,webp,avif}',
  { eager: true },
);

/**
 * Возвращает ImageMetadata по пути из данных (напр. "images/homepage-5/service/service-01.jpg").
 */
export function resolveImage(path: string): ImageMetadata {
  const normalized = path.replace(/^\/?images\//, '');
  const key = `/src/assets/images/${normalized}`;
  const mod = modules[key];
  if (!mod) {
    throw new Error(`Изображение не найдено в src/assets/images: ${key}`);
  }
  return mod.default;
}
