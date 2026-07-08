<?php

declare(strict_types=1);

namespace App\Application\Home\Queries;

use App\Application\Home\Dto\AboutFiveSectionDto;
use App\Application\Home\Dto\AboutOfferSectionDto;
use App\Application\Home\Dto\BlogPostDto;
use App\Application\Home\Dto\BlogSectionDto;
use App\Application\Home\Dto\ClientLogoDto;
use App\Application\Home\Dto\FaqItemDto;
use App\Application\Home\Dto\FaqSectionDto;
use App\Application\Home\Dto\FooterDto;
use App\Application\Home\Dto\HeroSlideDto;
use App\Application\Home\Dto\HomeHeaderDto;
use App\Application\Home\Dto\HomePageDto;
use App\Application\Home\Dto\IhboxItemDto;
use App\Application\Home\Dto\MarqueeItemDto;
use App\Application\Home\Dto\NavLinkDto;
use App\Application\Home\Dto\PortfolioSlideDto;
use App\Application\Home\Dto\PricingLineDto;
use App\Application\Home\Dto\PricingPlanDto;
use App\Application\Home\Dto\PricingSectionDto;
use App\Application\Home\Dto\ServiceCardDto;
use App\Application\Home\Dto\ServiceSectionDto;
use App\Application\Home\Dto\StaticBoxesSectionDto;
use App\Application\Home\Dto\StaticBoxItemDto;
use App\Application\Home\Dto\TestimonialDto;
use App\Application\Home\Dto\TestimonialSectionDto;

final class GetHomePageQuery
{
    public function execute(): HomePageDto
    {
        $brand = (string) config('site.brand');
        $phoneDisplay = (string) config('site.phone');
        $phoneTel = (string) config('site.phone_tel');
        $telegramUrl = (string) config('site.telegram_url');
        $phoneUrl = 'tel:'.$phoneTel;

        $homeUrl = url('/');
        $contactUrl = route('contact');
        $uslugiUrl = route('uslugi');

        $header = new HomeHeaderDto(
            logoPath: 'images/logo.png',
            logoAlt: $brand,
            homeUrl: $homeUrl,
            navItems: [
                new NavLinkDto('Главная', $homeUrl),
                new NavLinkDto('Услуги', $uslugiUrl),
                new NavLinkDto('Контакты', $contactUrl),
            ],
            primaryCtaLabel: 'Вызвать мастера',
            primaryCtaUrl: $telegramUrl,
        );

        $heroSlides = [
            new HeroSlideDto(
                backgroundImage: 'images/banner-slider-img/demo5-slide-03.png',
                isPrimaryHeading: true,
                titleLines: ['Химчистка мягкой мебели', 'в Тюмени'],
                descriptionLines: [
                    'Сушка с промышленным осушителем включена в работу — мебель быстрее готова к использованию.',
                ],
                ctaLabel: 'Вызвать мастера',
                ctaUrl: $telegramUrl,
            ),
            new HeroSlideDto(
                backgroundImage: 'images/banner-slider-img/demo5-slide-02.png',
                isPrimaryHeading: false,
                titleLines: ['Пора Чистить', 'мягкая мебель и матрасы'],
                descriptionLines: [
                    'От компактных прямых диванов до больших угловых и П‑образных секций — работаем на дому и в офисах.',
                ],
                ctaLabel: 'Рассчитать по фото',
                ctaUrl: $telegramUrl,
            ),
            new HeroSlideDto(
                backgroundImage: 'images/banner-slider-img/demo5-slide-01.png',
                isPrimaryHeading: false,
                titleLines: ['Тюмень и область', 'удобное время визита'],
                descriptionLines: [
                    'Оставьте заявку — подскажем срок, ориентир по цене и график выезда.',
                ],
                ctaLabel: 'Написать в MAX',
                ctaUrl: $telegramUrl,
            ),
        ];

        $services = new ServiceSectionDto(
            subtitle: 'Что делаем',
            title: 'Химчистка мебели и сопутствующие услуги.',
            fidNumber: '2',
            fidTitle: 'часа в среднем на одну мебельную единицу — в типовом случае',
            cards: [
                new ServiceCardDto(
                    '01',
                    'Диваны',
                    'Мягкая мебель и матрасы',
                    'Экстракция грязи, пятна по согласованию, безопасная сушка.',
                    'images/homepage-5/service/service-01.jpg',
                    'Химчистка прямого дивана — иллюстрация услуги',
                    $telegramUrl,
                ),
                new ServiceCardDto(
                    '02',
                    'Шторы',
                    'Химчистка штор без снятия',
                    'Чистка на месте без демонтажа: освежаем ткань, убираем загрязнения и запахи',
                    'images/homepage-5/service/shtori.jpg',
                    'Чистка мягкой мебели',
                    $telegramUrl,
                ),
                new ServiceCardDto(
                    '03',
                    'Кресла и стулья',
                    'Обивка и ворс',
                    'Финишный уход за ворсом, нейтрализация запахов',
                    'images/homepage-5/service/service-03.jpg',
                    'Химчистка кресла',
                    $telegramUrl,
                ),
                new ServiceCardDto(
                    '04',
                    'Ковролин',
                    'Покрытия и офисы',
                    'Чистим напольные покрытия в коммерческих помещениях',
                    'images/homepage-5/service/service-05.jpg',
                    'Чистка ковролина',
                    $telegramUrl,
                ),
            ],
        );

        $marquee = [
            new MarqueeItemDto('Химчистка дивана'),
            new MarqueeItemDto('Мягкая мебель Тюмень'),
            new MarqueeItemDto('Выезд мастера'),
            new MarqueeItemDto('Результат до/после'),
        ];

        $about = new AboutFiveSectionDto(
            videoUrl: 'https://www.youtube.com/watch?v=Sv2_JktdvmQ',
            videoLinkLabel: 'Смотреть процесс работы',
            subtitle: 'Пора Чистить',
            title: 'Почему клиенты выбирают нас.',
            paragraphs: [
                'Мы чистим диваны и мягкую мебель на дому и в офисах: от компактных прямых моделей до больших угловых и П‑образных секций. Работаем по Тюмени и области.',
                'Перед началом работы согласуем риски; для детей и питомцев подбираем безопасную химию. Оплата — после выполнения, способы обсуждаем заранее.',
            ],
            signatureImagePath: 'images/homepage-5/sign.png',
            signatureImageAlt: 'Подпись компании Пора Чистить',
        );

        $ihboxItems = [
            new IhboxItemDto('images/homepage-5/ihbox/ih-award01.png', 'Иконка направления', 'Диваны'),
            new IhboxItemDto('images/homepage-5/ihbox/ih-award02.png', 'Иконка направления', 'Матрасы'),
            new IhboxItemDto('images/homepage-5/ihbox/ih-award03.png', 'Иконка направления', 'Стулья'),
            new IhboxItemDto('images/homepage-5/ihbox/ih-award04.png', 'Иконка направления', 'Ковролин'),
            new IhboxItemDto('images/homepage-5/ihbox/ih-award05.png', 'Иконка направления', 'Шторы'),
        ];

        $hash = fn (string $anchor): string => $homeUrl.$anchor;
        $portfolioSlides = [
            new PortfolioSlideDto('До/после', $hash('#portfolio'), 'Свежая обивка', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-01.jpg', 'Пример работы — диван после химчистки'),
            new PortfolioSlideDto('Пятна', $hash('#portfolio'), 'Точечное пятновыведение', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-02.jpg', 'Работа с локальными загрязнениями'),
            new PortfolioSlideDto('Угловой', $hash('#portfolio'), 'Большой диван', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-03.jpg', 'Угловой диван после чистки'),
            new PortfolioSlideDto('Кресло', $hash('#portfolio'), 'Комплект мебели', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-04.jpg', 'Кресло — итог чистки'),
            new PortfolioSlideDto('Матрац', $hash('#portfolio'), 'Сон и гигиена', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-05.jpg', 'Чистка матраса'),
            new PortfolioSlideDto('Кожа', $hash('#portfolio'), 'Аккуратный уход', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-06.jpg', 'Кожаная обивка'),
            new PortfolioSlideDto('Офис', $hash('#portfolio'), 'Коммерческий заказ', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-07.jpg', 'Мягкая мебель в офисе'),
            new PortfolioSlideDto('Тюмень', $hash('#portfolio'), 'Выезд по городу', $hash('#portfolio'), 'images/homepage-5/portfolio/portfolio-08.jpg', 'Выездная химчистка в Тюмени'),
        ];

        $staticBoxes = new StaticBoxesSectionDto(
            subtitle: 'Пора Чистить',
            title: 'Как проходит химчистка дивана',
            boxes: [
                new StaticBoxItemDto(
                    '01',
                    'Осмотр и тест',
                    'Определяем тип обивки и степень загрязнения; пробуем раствор на скрытом фрагменте.',
                    'images/homepage-5/static-box/sbox-img-01.jpg',
                    'Этап 1 — осмотр мебели',
                    'Подробнее',
                    $telegramUrl,
                ),
                new StaticBoxItemDto(
                    '02',
                    'Подготовка и экстракция',
                    'Сухая подготовка, влажная чистка с извлечением грязи из ткани.',
                    'images/homepage-5/static-box/sbox-img-02.jpg',
                    'Этап 2 — экстракция',
                    'Подробнее',
                    $telegramUrl,
                ),
                new StaticBoxItemDto(
                    '03',
                    'Пятна',
                    'Локальные загрязнения — диагностика типа и пятновыводитель при необходимости.',
                    'images/homepage-5/static-box/sbox-img-03.jpg',
                    'Этап 3 — работа с пятнами',
                    'Подробнее',
                    $telegramUrl,
                ),
                new StaticBoxItemDto(
                    '04',
                    'Нейтрализация и сушка',
                    'Снимаем остатки моющих растворов, сушим обивку, приводим ворс в порядок.',
                    'images/homepage-5/static-box/sbox-img-04.jpg',
                    'Этап 4 — сушка',
                    'Заказать выезд',
                    $telegramUrl,
                ),
            ],
        );

        $aboutOffer = new AboutOfferSectionDto(
            phoneDisplay: $phoneDisplay,
            phoneUrl: $phoneUrl,
            subtitle: 'Режим работы и заявки',
            titleBeforeRotate: 'Делаем ваш диван ',
            rotatingWords: ['свежим', 'ухоженным', 'безопасным для семьи', 'готовым к использованию быстрее'],
            sideBadgeTitle: 'от 5 000',
        );

        $pricing = new PricingSectionDto(
            subtitle: 'Ориентиры по ценам',
            title: 'Стоимость химчистки в Тюмени',
            intro: 'Стоимость зависит от типа механизма, числа посадочных мест и фактической ширины. Ниже — ориентиры; точную цену фиксируем после фото или осмотра.',
            headlinePricePrefix: 'от',
            headlinePriceAmount: '5 000',
            headlinePriceSuffix: '',
            footnote: 'Минимальная сумма заказа, условия выезда и тариф за город уточняйте при звонке или в мессенджере. Актуальный прайс можно вынести на отдельную страницу «Цены».',
            plans: [
                new PricingPlanDto(
                    'Прямой диван 2–3 места',
                    'от 3 500',
                    '',
                    [
                        new PricingLineDto(true, 'Типовая влажная чистка с экстракцией'),
                        new PricingLineDto(true, 'Работа с доступными пятнами в рамках заказа'),
                        new PricingLineDto(true, 'Сушка техникой мастера'),
                        new PricingLineDto(true, 'Сложные пятна и запахи — по согласованию'),
                    ],
                    'Заказать',
                    $telegramUrl,
                    false,
                ),
                new PricingPlanDto(
                    'Угловой 4–5 мест',
                    'от 5 200',
                    '',
                    [
                        new PricingLineDto(true, 'Диагностика и тест раствора'),
                        new PricingLineDto(true, 'Экстракция и контроль влаги'),
                        new PricingLineDto(true, 'Финиш и ворс'),
                        new PricingLineDto(true, 'Рекомендации по эксплуатации после сушки'),
                        new PricingLineDto(true, 'Расчёт по фото в MAX'),
                    ],
                    'Рассчитать',
                    $telegramUrl,
                    true,
                ),
                new PricingPlanDto(
                    'П‑образный, крупный',
                    'от 8 500',
                    '',
                    [
                        new PricingLineDto(true, 'Большой объём обивки и посадочные места'),
                        new PricingLineDto(true, 'Удаление запаха как отдельная услуга'),
                        new PricingLineDto(true, 'Деликатные ткани + 30% к стоимости'),
                        new PricingLineDto(true, 'Выполнение работы под ключ'),
                    ],
                    'Написать нам',
                    $telegramUrl,
                    false,
                ),
            ],
        );

        $faq = new FaqSectionDto(
            anchorId: 'faq',
            leftAccordionId: 'faq-accordion-a',
            rightAccordionId: 'faq-accordion-b',
            subtitle: 'Заказчикам',
            title: 'Если остались вопросы',
            intro: 'Коротко о цене, сушке, сроках и том, чего ждать от химчистки. Если не найдёте ответ — свяжитесь с нами.',
            leftColumn: [
                new FaqItemDto(
                    'Сколько стоит химчистка дивана?',
                    'Зависит от модели; ориентиры — в блоке с ценами выше. Итоговую сумму фиксируем после фото или короткого осмотра.',
                ),
                new FaqItemDto(
                    'Сколько сохнет диван?',
                    'Обычно несколько часов; точнее — по типу ткани, температуре и влажности в комнате. Рекомендуем проветривание и не нагружать обивку до полного высыхания.',
                ),
                new FaqItemDto(
                    'Чем отличается профессиональная чистка от бытовой?',
                    'Извлечение грязи из толщины обивки, контроль влаги и растворов, безопасная схема для сложных пятен.',
                ),
                new FaqItemDto(
                    'Сколько длятся работы?',
                    'От часа до двух в типовом случае.',
                ),
            ],
            rightColumn: [
                new FaqItemDto(
                    'Что входит в базовую химчистку?',
                    'Механическая подготовка, влажная чистка, работа с доступными пятнами в рамках заказа, антисептическая обработка по протоколу, (сушка оплачивается отдельно), и как правило занимает 60-90 минут',
                ),
                new FaqItemDto(
                    'Можно в выходной?',
                    'Да, если так заложено в график — укажите желаемое окно в заявке.',
                ),
                new FaqItemDto(
                    'Будет ли «как новый»?',
                    'Чистка заметно улучшает вид и гигиену, но не восстанавливает изношенную обивку и не убирает въевшиеся следы после бытовых экспериментов с пятновыводителями.',
                ),
                new FaqItemDto(
                    'Останется ли запах химии?',
                    'При работе с растворителями возможен кратковременный запах; мастер предупредит заранее. После завершения рекомендуем проветривание.',
                ),
            ],
        );

        $testimonials = new TestimonialSectionDto(
            subtitle: 'Отзывы',
            title: 'Нам доверяют заказчики в Тюмени.',
            items: [
                new TestimonialDto(
                    'Мастер приехал вовремя, застелил пол, объяснил про ткань. Диван высох за вечер, запаха химии почти не было.',
                    'Анна',
                    'Тюмень',
                    'images/homepage-5/testimonial/reviewer-01.jpg',
                    'Фото клиента — отзыв о химчистке',
                ),
                new TestimonialDto(
                    'Угловой диван после кота — стало заметно лучше. Предупредили, что сложный запах может потребовать второго визита, честно.',
                    'Михаил',
                    'Тюменская область',
                    'images/homepage-5/testimonial/reviewer-02.jpg',
                    'Фото клиента — отзыв',
                ),
                new TestimonialDto(
                    'Оставляли заявку через MAX, прислали фото — назвали ориентир цены. Оплата после работы, как обещали.',
                    'Елена',
                    'Тюмень',
                    'images/homepage-5/testimonial/reviewer-03.jpg',
                    'Фото клиента — отзыв',
                ),
                new TestimonialDto(
                    'Чистили кресла в офисе в тот же день. Аккуратно, без лишней воды на ламинате.',
                    'ИП «Логистик»',
                    'Тюмень',
                    'images/homepage-5/testimonial/reviewer-04.jpg',
                    'Логотип или фото заказчика B2B',
                ),
            ],
            ratingValue: '5,0',
            ratingCaption: 'средняя оценка по отзывам клиентов',
        );

        $clientLogos = [];
        for ($i = 1; $i <= 10; $i++) {
            $n = str_pad((string) $i, 2, '0', STR_PAD_LEFT);
            $clientLogos[] = new ClientLogoDto(
                hoverImagePath: "images/homepage-4/client/client-global-{$n}.png",
                greyImagePath: "images/homepage-4/client/client-grey-{$n}.png",
                visuallyHiddenTitle: "Партнёр {$i}",
                alt: "Логотип партнёра {$i} — иллюстрация блока доверия",
            );
        }

        $blog = new BlogSectionDto(
            subtitle: 'Полезное',
            title: 'Материалы для заказчиков',
            posts: [
                new BlogPostDto(
                    'images/homepage-2/blog/blog-01.jpg',
                    'Уход за диваном после чистки',
                    'Советы',
                    $homeUrl,
                    '10 минут чтения',
                    'Пора Чистить',
                    'Как ускорить сушку и сохранить ворс после химчистки',
                    $homeUrl,
                    'Проветривание, нагрузка на обивку и типичные ошибки в первые часы после визита мастера.',
                ),
                new BlogPostDto(
                    'images/homepage-2/blog/blog-02.jpg',
                    'Пятна и DIY',
                    'Гайд',
                    $homeUrl,
                    '8 минут',
                    'Пора Чистить',
                    'Почему домашние эксперименты усложняют выведение пятен',
                    $homeUrl,
                    'Когда стоит звать мастера сразу и что лучше не пробовать на диване самостоятельно.',
                ),
                new BlogPostDto(
                    'images/homepage-2/blog/blog-03.jpg',
                    'Запах и животные',
                    'Здоровье',
                    $homeUrl,
                    '12 минут',
                    'Пора Чистить',
                    'Что реально помогает при запахе мочи на обивке',
                    $homeUrl,
                    'Связка основной чистки и целевых средств — без обещаний «как с витрины».',
                ),
                new BlogPostDto(
                    'images/homepage-2/blog/blog-04.jpg',
                    'График',
                    'Сервис',
                    $homeUrl,
                    '6 минут',
                    'Пора Чистить',
                    'Как мы планируем выезд по Тюмени и области',
                    $homeUrl,
                    'Окна 8:00–22:00 и согласование времени без лишних ожиданий.',
                ),
                new BlogPostDto(
                    'images/homepage-2/blog/blog-05.jpg',
                    'Кожа',
                    'Материалы',
                    $homeUrl,
                    '9 минут',
                    'Пора Чистить',
                    'Особенности чистки кожи и кожзама',
                    $homeUrl,
                    'Тест совместимости, увлажнение и то, чего избегаем в домашних условиях.',
                ),
            ],
            seeAllLabel: 'Все материалы',
            seeAllUrl: $homeUrl,
        );

        $footer = new FooterDto(
            columnOne: [
                new NavLinkDto('Главная', $homeUrl),
                new NavLinkDto('Услуги', $uslugiUrl),
                new NavLinkDto('Контакты', $contactUrl),
            ],
            columnTwo: [
                new NavLinkDto('Политика конфиденциальности', $homeUrl),
                new NavLinkDto('Пользовательское соглашение', $homeUrl),
                new NavLinkDto('MAX', $telegramUrl),
            ],
            logoPath: 'images/favicon.svg',
            logoAlt: $brand,
            instagram: [
                ['url' => '#', 'imagePath' => 'images/footer/img-01.jpg', 'alt' => 'Фото работы 1'],
                ['url' => '#', 'imagePath' => 'images/footer/img-02.jpg', 'alt' => 'Фото работы 2'],
                ['url' => '#', 'imagePath' => 'images/footer/img-03.jpg', 'alt' => 'Фото работы 3'],
                ['url' => '#', 'imagePath' => 'images/footer/img-04.jpg', 'alt' => 'Фото работы 4'],
                ['url' => '#', 'imagePath' => 'images/footer/img-05.jpg', 'alt' => 'Фото работы 5'],
                ['url' => '#', 'imagePath' => 'images/footer/img-06.jpg', 'alt' => 'Фото работы 6'],
            ],
            email: 'info@chistotyumen.ru',
            emailUrl: 'mailto:info@chistotyumen.ru',
            phoneDisplay: $phoneDisplay,
            addressHtml: 'Выездная химчистка: Тюмень и Тюменская область<br>Заявки по телефону и в MAX.',
            copyrightLine: ' © '.date('Y').' '.$brand.'. Все права защищены.',
            facebookUrl: '#',
            telegramUrl: $telegramUrl,
        );

        return new HomePageDto(
            header: $header,
            heroSlides: $heroSlides,
            services: $services,
            marquee: $marquee,
            about: $about,
            ihboxItems: $ihboxItems,
            portfolioSlides: $portfolioSlides,
            staticBoxes: $staticBoxes,
            aboutOffer: $aboutOffer,
            pricing: $pricing,
            faq: $faq,
            testimonials: $testimonials,
            clientLogos: $clientLogos,
            blog: $blog,
            footer: $footer,
        );
    }
}
