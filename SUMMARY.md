# Документация проекта «Чисто Тюмень»

## Миграция главной страницы (из Laravel Blade в Astro)

Главная страница перенесена из reference-проекта
`ref/chistotyumen-laravel-main/resources/views/pages/home.blade.php`
в Astro с сохранением исходной структуры, вёрстки и контента.

### Структура

- `src/pages/index.astro` — сборка главной страницы. Повторяет разметку
  `home.blade.php`: `page-wrapper` → `HeaderSlider` → `page-content`
  (12 секций) → `FooterFive`.
- `src/layouts/Layout.astro` — базовый layout (подключение CSS/JS темы,
  `<title>` и meta `description`, SEO-значения из `LandingHomeSeo`).
- `src/data/home.ts` — весь статический контент главной (mock-данные),
  перенесён из `App\Application\Home\Queries\GetHomePageQuery` и
  `config/site.php`. Типизирован через TypeScript-интерфейсы.
- `src/lib/asset.ts` — helper `asset()` для путей к статике из `/public`
  (аналог `asset()` в Laravel).

### Компоненты (`src/components/landing/`)

Каждый Blade-компонент из `resources/views/components/landing/` имеет
Astro-аналог:

| Blade | Astro |
| --- | --- |
| `header-slider` | `HeaderSlider.astro` |
| `service-five` | `ServiceFive.astro` |
| `marquee-section` | `MarqueeSection.astro` |
| `about-five` | `AboutFive.astro` |
| `ihbox-five` | `IhboxFive.astro` |
| `portfolio-five` | `PortfolioFive.astro` |
| `static-box-five` | `StaticBoxFive.astro` |
| `about-offer-five` | `AboutOfferFive.astro` |
| `pricing-five` | `PricingFive.astro` |
| `faq-section` + `faq-accordion` | `FaqSection.astro` + `FaqAccordion.astro` |
| `testimonial-five` | `TestimonialFive.astro` |
| `clients-five` | `ClientsFive.astro` |
| `blog-five` | `BlogFive.astro` |
| `footer-five` | `FooterFive.astro` |

## Оптимизация изображений (ленивая загрузка через `<Image>`)

Все контентные изображения на главной переведены с обычного `<img>` на
компонент `<Image />` из `astro:assets`. Это даёт автоматическую
оптимизацию (WebP + генерация `width`/`height`) и ленивую загрузку
(`loading="lazy"` + `decoding="async"`) «из коробки».

- `src/lib/images.ts` — helper `resolveImage()`. Через
  `import.meta.glob('/src/assets/images/**/*', { eager: true })` резолвит
  путь из `home.ts` (напр. `images/homepage-5/service/service-01.jpg`) в
  `ImageMetadata` для `<Image />`.
- `src/assets/images/` — исходники изображений, используемых в `<img>`
  (Astro оптимизирует их только из `src`, не из `public`). Файлы в
  `public/images/` сохранены для CSS-фонов (hero, static-box), favicon и
  прочей статики.
- Компоненты переведены на `<Image loading="lazy" />`: `HeaderSlider`,
  `ServiceFive`, `AboutFive`, `IhboxFive`, `PortfolioFive`, `StaticBoxFive`,
  `TestimonialFive`, `ClientsFive`, `BlogFive`, `FooterFive`.

### Проверка

- `npm run build` — сборка проходит успешно, генерируется `dist/index.html`
  со всеми секциями, брендом «Пора Чистить» и SEO-заголовком.
- В `dist/index.html`: 59 изображений с `loading="lazy"` и `decoding="async"`,
  отдаются в формате WebP (напр. `shtori.jpg` 953 КБ → 244 КБ).

## Кластерные (посадочные) страницы

Созданы 5 SEO-посадочных страниц — полные копии главной с уникальным
поисковым интентом. Каждая лежит в собственной папке `src/pages/<slug>/index.astro`
и переиспользует те же компоненты `landing/`, что и главная.

| URL | Интент |
| --- | --- |
| `/khimchistka-divanov` | Химчистка диванов (прямые, угловые, П‑образные) |
| `/khimchistka-kovrov` | Химчистка ковров, паласов, дорожек (на дому/с вывозом) |
| `/khimchistka-matrasov` | Химчистка матрасов (пятна, запах, детские/ортопедические) |
| `/khimchistka-myagkoy-mebeli` | Химчистка мягкой мебели (диваны, кресла, стулья, матрасы) |
| `/khimchistka-stulev` | Химчистка стульев и кресел (дом, офис, комплекты) |

### Архитектура

- `src/data/clusters.ts` — данные всех кластеров. Функция `buildCluster()`
  собирает `ClusterData`: интент-текст (hero, услуги, «о нас», цены, FAQ,
  meta `title`/`description`) уникален для каждого кластера, а общие ассеты
  (портфолио, логотипы, отзывы, блог, футер, ihbox, static-box) импортируются
  из `home.ts` — без дублирования.
- Реестр `clusters` (ключ = slug) и тип `ClusterSlug` связывают данные со
  страницами. Каждая страница передаёт `data.meta.title/description` в
  `Layout` для корректного SEO.
- Ключевые слова взяты из кластеров в `seo/` и адаптированы под Тюмень
  (без региона «Москва»), синонимичные формулировки без переспама.

### Уникальный контент блоков

Блоки `MarqueeSection`, `IhboxFive`, `PortfolioFive`, `TestimonialFive` и
`StaticBoxFive` теперь уникальны для каждой посадочной страницы. В
`buildCluster()` они собираются из полей конфига: `marquee`, `ihboxTitles`,
`portfolio` (категория/заголовок/alt), `testimonialItems` (цитата/автор/деталь/alt)
+ `testimonialsTitle`, а также `staticBoxTitle` и `staticBoxSteps`
(заголовок + 4 шага: title/description/alt). Изображения (иконки ihbox,
портфолио, аватары отзывов, фоны шагов) и кнопки переиспользуются из
`home.ts` — меняется только текст под интент кластера.

### Меню «Услуги» с посадочными страницами

Пункт меню «Услуги» стал выпадающим (по образцу `source/homepage-5.html`):
все 5 посадочных страниц собраны в подменю раздела «Услуги».

- `src/data/home.ts` — интерфейс `NavLink` расширен опциональным полем
  `children?: NavLink[]`; у пункта «Услуги» добавлен `children` со ссылками
  на `/khimchistka-divanov`, `/khimchistka-kovrov`, `/khimchistka-matrasov`,
  `/khimchistka-myagkoy-mebeli`, `/khimchistka-stulev`.
- `src/components/landing/HeaderSlider.astro` и
  `src/components/landing/HeaderServiceDetails.astro` — рендер меню отрисовывает
  пункт с `children` как `li.dropdown` с вложенным `<ul>` (подменю услуг),
  как в оригинальной вёрстке темы (`source/homepage-4.html`). `span.righticon`
  не добавляется вручную — его вставляет `public/js/scripts.js` для мобильного
  меню (иначе дублировался бы).

### Проверка

- `npm run build` — успешно, `6 page(s) built`: главная + 5 кластеров.
  В `dist/` присутствуют папки `khimchistka-divanov`, `khimchistka-kovrov`,
  `khimchistka-matrasov`, `khimchistka-myagkoy-mebeli`, `khimchistka-stulev`.
- В собранном HTML пункт «Услуги» — `li.dropdown` с подменю из 5 ссылок
  на посадочные страницы.

## Страница «Контакты» (миграция из Laravel Blade в Astro)

Страница контактов перенесена из reference-проекта
`ref/chistotyumen-laravel-main/resources/views/pages/contact-us.blade.php`
(и `GetContactPageQuery` + `ContactPageSeo`) с сохранением структуры,
вёрстки и контента.

### Структура

- `src/pages/contact/index.astro` — сборка страницы (URL `/contact`).
  Повторяет разметку `contact-us.blade.php`: `page-wrapper` →
  `HeaderServiceDetails` → `TitleBar` → `page-content`
  (`ContactIhboxSwiper` → `ContactFormSection` → `ClientsSwiper` →
  `MapEmbed`) → `FooterFive`. JSON-LD (`ContactPage` + `Organization`)
  добавлен через `<script type="application/ld+json">`.
- `src/data/contact.ts` — статический контент страницы (перенос из
  `GetContactPageQuery`, SEO из `ContactPageSeo`, `mapEmbedUrl` из
  `config/site.php`). Общие данные (`site`, `clientLogos`, `footer`)
  переиспользуются из `home.ts` без дублирования.

### Компоненты (`src/components/landing/`)

| Blade | Astro |
| --- | --- |
| `header-service-details` | `HeaderServiceDetails.astro` |
| `title-bar` | `TitleBar.astro` |
| `contact-ihbox-swiper` | `ContactIhboxSwiper.astro` |
| `contact-form-section` | `ContactFormSection.astro` |
| `clients-swiper` | `ClientsSwiper.astro` |
| `map-embed` | `MapEmbed.astro` |

Форма обратной связи адаптирована под статический сайт: удалены
серверные части Laravel (`@csrf`, `session()`, `$errors`, `old()`),
сохранены разметка, классы и `id` (`#contact-form`, `.message-status`)
для совместимости с `public/js/scripts.js`; `action="#"`.

Поле «Тема обращения» заменено на выпадающий список услуг:
`select#contact-subject` наполняется опциями из посадочных страниц.
`src/data/contact.ts` формирует `serviceOptions` из пункта меню «Услуги»
(`home.ts` header), `contact/index.astro` передаёт их в `ContactFormSection`,
где рендерится `<select>` с `<option value="{label}" data-url="{url}">`
(первый пункт-плейсхолдер «Выберите услугу»). Так список услуг не дублируется.

### Проверка

- `npm run build` — успешно, `7 page(s) built`; сгенерирован
  `dist/contact/index.html` со всеми секциями и JSON-LD.

## Посты-продолжения кластеров (Content Collections)

Для каждого кластера добавлен блок статей-продолжений поискового интента:
список постов на самой кластерной странице и отдельная детальная страница
по адресу `/<cluster>/<slug>` (напр. `/khimchistka-stulev/kak-zakazat-himchistku-stulev`).

### Архитектура

- `src/content.config.ts` — collection `posts` (glob-loader,
  `src/content/posts/**/*.md`). Схема: `cluster`, `title`, `description`,
  `excerpt`, `dateLabel`, `author`, `imagePath`, `imageAlt`, `order`.
- `src/content/posts/<cluster>/*.md` — по 7 постов на кластеры диванов, ковров, матрасов и по 6 постов для стульев и мягкой мебели, тексты под интент кластера, поле `cluster` = slug папки.
- `src/components/landing/ClusterPosts.astro` — список постов, вёрстка по
  макету `source/blog-m-grid-col-3.html` (masonry, `col-md-4`). Данные
  запрашиваются на кластерной странице через `getCollection('posts', ...)`
  с фильтром по `cluster` и сортировкой по `order`.
- `src/layouts/PostLayout.astro` — единый макет детальной страницы поста,
  вёрстка в точности по `source/service-details.html`
  (`HeaderServiceDetails` → `TitleBar` → `section.service-details`
  с главным изображением, сайдбаром-виджетами и контентом из markdown
  через `<slot/>` → `FooterFive`). Принимает `frontmatter` поста.
- Контентный блок поста воспроизводит ВСЮ вёрстку макета, не только текст:
  заголовок + firstletter (markdown-слот), два столбца списка с галочками
  (`list-group-borderless`), два изображения (`service-det-img`), абзац,
  три круговых счётчика (`fid-style-rea` / `pbmit-circle-outer`) и
  FAQ-аккордеон. Текст берётся из полей frontmatter (`contentTitle`,
  `features`, `image2/image3`, `paragraph2`, `stats`, `faqTitle/faqIntro`,
  `faqs`) с тематическими значениями по умолчанию — меняется только текст,
  структура одинакова для всех постов.
- Поле `layout` добавлено в схему коллекции (`content.config.ts`,
  default `../../layouts/PostLayout.astro`) и проставлено во frontmatter
  всех постов — единая вёрстка для всех детальных страниц.
- `src/pages/[cluster]/[post].astro` — тонкий маршрут: `getStaticPaths()`
  генерирует пути по всем постам, рендерит markdown-контент в слот
  `PostLayout`.
- Список постов выводится на каждой кластерной странице сразу после секции
  услуг (`ServiceFive`, класс `service-section-five`).
- Карточки услуг в `service-section-five` ведут на посты, а не на `tel:`.
  `ServiceCard.detailUrl` теперь заполняется URL постов: на каждой кластерной
  странице карточки сопоставляются с `clusterPosts` по индексу
  (`detailUrl: clusterPosts[i]?.url ?? card.detailUrl`), а `ServiceFive.astro`
  использует `card.detailUrl` (с fallback на телефон) в ссылках карточки,
  заголовка и кнопки. Это устраняет 404 (ссылки ведут на существующие
  страницы постов).
- Карточки услуг на **главной** (`src/pages/index.astro`) больше не ведут на
  мессенджер (max.ru). Их `detailUrl` привязан к первым постам
  соответствующих кластеров: `getCollection('posts')` + сопоставление
  карточек кластерам (`khimchistka-divanov`, `khimchistka-myagkoy-mebeli`,
  `khimchistka-stulev`, `khimchistka-kovrov`), fallback на прежнее значение.

### Проверка

- `npm run build` — успешно, `34 page(s) built`: главная, контакты,
  5 кластеров и 27 постов (включая «Химчистка матрасов летом» и «Химчистка ковров после животных»).
  Сгенерированы, напр.,
  `dist/khimchistka-kovrov/himchistka-kovra-posle-zhivotnyh/index.html` с
  контентом статьи и макетом `service-details`.
