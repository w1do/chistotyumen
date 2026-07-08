// Статический контент главной страницы (миграция из Laravel GetHomePageQuery).
// Пути к изображениям указаны относительно /public (обслуживаются из корня сайта).

export const site = {
  brand: 'Чисто Тюмень',
  siteUrl: 'https://chistotyumen.ru',
  phone: '+7 908 871 20 26',
  phoneTel: '+79088712026',
  telegramUrl:
    'https://max.ru/u/f9LHodD0cOLeMgV6h26S2GICOtJz4BX_S-Nx-FeP14vKOfSQsSPHg_OhSzU',
} as const;

const homeUrl = '/';
const uslugiUrl = '/uslugi';
const contactUrl = '/contact';
const phoneUrl = `tel:${site.phoneTel}`;
const tg = site.telegramUrl;

export interface NavLink {
  label: string;
  url: string;
  children?: NavLink[];
}

export const header = {
  logoPath: 'images/logo.png',
  logoAlt: site.brand,
  homeUrl,
  navItems: [
    { label: 'Главная', url: homeUrl },
    {
      label: 'Услуги',
      url: '/uslugi',
      children: [
        { label: 'Химчистка диванов', url: '/uslugi/khimchistka-divanov' },
        { label: 'Химчистка ковров', url: '/uslugi/khimchistka-kovrov' },
        { label: 'Химчистка матрасов', url: '/uslugi/khimchistka-matrasov' },
        { label: 'Химчистка мягкой мебели', url: '/uslugi/khimchistka-myagkoy-mebeli' },
        { label: 'Химчистка стульев', url: '/uslugi/khimchistka-stulev' },
      ],
    },
    { label: 'Блог', url: '/posts' },
    { label: 'Контакты', url: contactUrl },
  ] as NavLink[],
  primaryCtaLabel: 'Вызвать мастера',
  primaryCtaUrl: tg,
};

export interface HeroSlide {
  backgroundImage: string;
  isPrimaryHeading: boolean;
  titleLines: string[];
  descriptionLines: string[];
  ctaLabel: string;
  ctaUrl: string;
}

export const heroSlides: HeroSlide[] = [
  {
    backgroundImage: 'images/banner-slider-img/demo5-slide-03.png',
    isPrimaryHeading: true,
    titleLines: ['Химчистка мягкой мебели', 'в Тюмени'],
    descriptionLines: [
      'Сушка с промышленным осушителем включена в работу — мебель быстрее готова к использованию.',
    ],
    ctaLabel: 'Вызвать мастера',
    ctaUrl: tg,
  },
  {
    backgroundImage: 'images/banner-slider-img/demo5-slide-02.png',
    isPrimaryHeading: false,
    titleLines: ['Чисто Тюмень', 'мягкая мебель и матрасы'],
    descriptionLines: [
      'От компактных прямых диванов до больших угловых и П‑образных секций — работаем на дому и в офисах.',
    ],
    ctaLabel: 'Рассчитать по фото',
    ctaUrl: tg,
  },
  {
    backgroundImage: 'images/banner-slider-img/demo5-slide-01.png',
    isPrimaryHeading: false,
    titleLines: ['Тюмень и область', 'удобное время визита'],
    descriptionLines: [
      'Оставьте заявку — подскажем срок, ориентир по цене и график выезда.',
    ],
    ctaLabel: 'Написать в MAX',
    ctaUrl: tg,
  },
];

export interface ServiceCard {
  number: string;
  category: string;
  title: string;
  description: string;
  imagePath: string;
  imageAlt: string;
  detailUrl: string;
}

export const services = {
  subtitle: 'Что делаем',
  title: 'Химчистка мебели',
  fidNumber: '2',
  fidTitle: 'часа в среднем на одну мебельную единицу — в типовом случае',
  cards: [
    {
      number: '01',
      category: 'Диваны',
      title: 'Мягкая мебель и матрасы',
      description: 'Экстракция грязи, пятна по согласованию, безопасная сушка.',
      imagePath: 'images/homepage-5/service/service-01.jpg',
      imageAlt: 'Химчистка прямого дивана — иллюстрация услуги',
      detailUrl: tg,
    },
    {
      number: '02',
      category: 'Шторы',
      title: 'Химчистка штор без снятия',
      description:
        'Чистка на месте без демонтажа: освежаем ткань, убираем загрязнения и запахи',
      imagePath: 'images/homepage-5/service/shtori.jpg',
      imageAlt: 'Чистка мягкой мебели',
      detailUrl: tg,
    },
    {
      number: '03',
      category: 'Кресла и стулья',
      title: 'Обивка и ворс',
      description: 'Финишный уход за ворсом, нейтрализация запахов',
      imagePath: 'images/homepage-5/service/service-03.jpg',
      imageAlt: 'Химчистка кресла',
      detailUrl: tg,
    },
    {
      number: '04',
      category: 'Ковролин',
      title: 'Покрытия и офисы',
      description: 'Чистим напольные покрытия в коммерческих помещениях',
      imagePath: 'images/homepage-5/service/service-05.jpg',
      imageAlt: 'Чистка ковролина',
      detailUrl: tg,
    },
  ] as ServiceCard[],
  phoneTel: site.phoneTel,
};

export interface MarqueeItem {
  text: string;
}

export const marquee: MarqueeItem[] = [
  { text: 'Химчистка дивана' },
  { text: 'Мягкая мебель Тюмень' },
  { text: 'Выезд мастера' },
  { text: 'Результат до/после' },
];

export const about = {
  videoUrl: 'https://www.youtube.com/watch?v=Sv2_JktdvmQ',
  videoLinkLabel: 'Смотреть процесс работы',
  subtitle: 'Чисто Тюмень',
  title: 'Почему клиенты выбирают нас.',
  paragraphs: [
    'Мы чистим диваны и мягкую мебель на дому и в офисах: от компактных прямых моделей до больших угловых и П‑образных секций. Работаем по Тюмени и области.',
    'Перед началом работы согласуем риски; для детей и питомцев подбираем безопасную химию. Оплата — после выполнения, способы обсуждаем заранее.',
  ],
  signatureImagePath: 'images/homepage-5/sign.png',
  signatureImageAlt: 'Подпись компании Чисто Тюмень',
};

export interface IhboxItem {
  imagePath: string;
  imageAlt: string;
  title: string;
}

export const ihboxItems: IhboxItem[] = [
  { imagePath: 'images/homepage-5/ihbox/ih-award01.png', imageAlt: 'Иконка направления', title: 'Диваны' },
  { imagePath: 'images/homepage-5/ihbox/ih-award02.png', imageAlt: 'Иконка направления', title: 'Матрасы' },
  { imagePath: 'images/homepage-5/ihbox/ih-award03.png', imageAlt: 'Иконка направления', title: 'Стулья' },
  { imagePath: 'images/homepage-5/ihbox/ih-award04.png', imageAlt: 'Иконка направления', title: 'Ковролин' },
  { imagePath: 'images/homepage-5/ihbox/ih-award05.png', imageAlt: 'Иконка направления', title: 'Шторы' },
];

export interface PortfolioSlide {
  categoryLabel: string;
  categoryUrl: string;
  titleText: string;
  titleUrl: string;
  imagePath: string;
  imageAlt: string;
}

const hash = (anchor: string): string => `${homeUrl}${anchor}`;

export const portfolioSlides: PortfolioSlide[] = [
  { categoryLabel: 'До/после', categoryUrl: hash('#portfolio'), titleText: 'Свежая обивка', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-01.jpg', imageAlt: 'Пример работы — диван после химчистки' },
  { categoryLabel: 'Пятна', categoryUrl: hash('#portfolio'), titleText: 'Точечное пятновыведение', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-02.jpg', imageAlt: 'Работа с локальными загрязнениями' },
  { categoryLabel: 'Угловой', categoryUrl: hash('#portfolio'), titleText: 'Большой диван', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-03.jpg', imageAlt: 'Угловой диван после чистки' },
  { categoryLabel: 'Кресло', categoryUrl: hash('#portfolio'), titleText: 'Комплект мебели', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-04.jpg', imageAlt: 'Кресло — итог чистки' },
  { categoryLabel: 'Матрац', categoryUrl: hash('#portfolio'), titleText: 'Сон и гигиена', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-05.jpg', imageAlt: 'Чистка матраса' },
  { categoryLabel: 'Кожа', categoryUrl: hash('#portfolio'), titleText: 'Аккуратный уход', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-06.jpg', imageAlt: 'Кожаная обивка' },
  { categoryLabel: 'Офис', categoryUrl: hash('#portfolio'), titleText: 'Коммерческий заказ', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-07.jpg', imageAlt: 'Мягкая мебель в офисе' },
  { categoryLabel: 'Тюмень', categoryUrl: hash('#portfolio'), titleText: 'Выезд по городу', titleUrl: hash('#portfolio'), imagePath: 'images/homepage-5/portfolio/portfolio-08.jpg', imageAlt: 'Выездная химчистка в Тюмени' },
];

export interface StaticBoxItem {
  number: string;
  title: string;
  description: string;
  backgroundImagePath: string;
  foregroundImageAlt: string;
  buttonLabel: string;
  buttonUrl: string;
}

export const staticBoxes = {
  subtitle: 'Чисто Тюмень',
  title: 'Как проходит химчистка дивана',
  boxes: [
    {
      number: '01',
      title: 'Осмотр и тест',
      description:
        'Определяем тип обивки и степень загрязнения; пробуем раствор на скрытом фрагменте.',
      backgroundImagePath: 'images/homepage-5/static-box/sbox-img-01.jpg',
      foregroundImageAlt: 'Этап 1 — осмотр мебели',
      buttonLabel: 'Подробнее',
      buttonUrl: tg,
    },
    {
      number: '02',
      title: 'Подготовка и экстракция',
      description: 'Сухая подготовка, влажная чистка с извлечением грязи из ткани.',
      backgroundImagePath: 'images/homepage-5/static-box/sbox-img-02.jpg',
      foregroundImageAlt: 'Этап 2 — экстракция',
      buttonLabel: 'Подробнее',
      buttonUrl: tg,
    },
    {
      number: '03',
      title: 'Пятна',
      description:
        'Локальные загрязнения — диагностика типа и пятновыводитель при необходимости.',
      backgroundImagePath: 'images/homepage-5/static-box/sbox-img-03.jpg',
      foregroundImageAlt: 'Этап 3 — работа с пятнами',
      buttonLabel: 'Подробнее',
      buttonUrl: tg,
    },
    {
      number: '04',
      title: 'Нейтрализация и сушка',
      description:
        'Снимаем остатки моющих растворов, сушим обивку, приводим ворс в порядок.',
      backgroundImagePath: 'images/homepage-5/static-box/sbox-img-04.jpg',
      foregroundImageAlt: 'Этап 4 — сушка',
      buttonLabel: 'Заказать выезд',
      buttonUrl: tg,
    },
  ] as StaticBoxItem[],
};

export const aboutOffer = {
  phoneDisplay: site.phone,
  phoneUrl,
  subtitle: 'Режим работы и заявки',
  titleBeforeRotate: 'Делаем ваш диван ',
  rotatingWords: ['свежим', 'ухоженным', 'безопасным для семьи', 'готовым к использованию быстрее'],
  sideBadgeTitle: 'от 5 000',
};

export interface PricingLine {
  hasCheckIcon: boolean;
  text: string;
}

export interface PricingPlan {
  name: string;
  price: string;
  period: string;
  lines: PricingLine[];
  ctaLabel: string;
  ctaUrl: string;
  featured: boolean;
}

export const pricing = {
  subtitle: 'Ориентиры по ценам',
  title: 'Стоимость химчистки в Тюмени',
  intro:
    'Стоимость зависит от типа механизма, числа посадочных мест и фактической ширины. Ниже — ориентиры; точную цену фиксируем после фото или осмотра.',
  headlinePricePrefix: 'от',
  headlinePriceAmount: '5 000',
  headlinePriceSuffix: '',
  footnote:
    'Минимальная сумма заказа, условия выезда и тариф за город уточняйте при звонке или в мессенджере. Актуальный прайс можно вынести на отдельную страницу «Цены».',
  plans: [
    {
      name: 'Прямой диван 2–3 места',
      price: 'от 3 500',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Типовая влажная чистка с экстракцией' },
        { hasCheckIcon: true, text: 'Работа с доступными пятнами в рамках заказа' },
        { hasCheckIcon: true, text: 'Сушка техникой мастера' },
        { hasCheckIcon: true, text: 'Сложные пятна и запахи — по согласованию' },
      ],
      ctaLabel: 'Заказать',
      ctaUrl: tg,
      featured: false,
    },
    {
      name: 'Угловой 4–5 мест',
      price: 'от 5 200',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Диагностика и тест раствора' },
        { hasCheckIcon: true, text: 'Экстракция и контроль влаги' },
        { hasCheckIcon: true, text: 'Финиш и ворс' },
        { hasCheckIcon: true, text: 'Рекомендации по эксплуатации после сушки' },
        { hasCheckIcon: true, text: 'Расчёт по фото в MAX' },
      ],
      ctaLabel: 'Рассчитать',
      ctaUrl: tg,
      featured: true,
    },
    {
      name: 'П‑образный, крупный',
      price: 'от 8 500',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Большой объём обивки и посадочные места' },
        { hasCheckIcon: true, text: 'Удаление запаха как отдельная услуга' },
        { hasCheckIcon: true, text: 'Деликатные ткани + 30% к стоимости' },
        { hasCheckIcon: true, text: 'Выполнение работы под ключ' },
      ],
      ctaLabel: 'Написать нам',
      ctaUrl: tg,
      featured: false,
    },
  ] as PricingPlan[],
};

export interface FaqItem {
  question: string;
  answer: string;
}

export const faq = {
  anchorId: 'faq',
  leftAccordionId: 'faq-accordion-a',
  rightAccordionId: 'faq-accordion-b',
  subtitle: 'Заказчикам',
  title: 'Если остались вопросы',
  intro:
    'Коротко о цене, сушке, сроках и том, чего ждать от химчистки. Если не найдёте ответ — свяжитесь с нами.',
  leftColumn: [
    {
      question: 'Сколько стоит химчистка дивана?',
      answer:
        'Зависит от модели; ориентиры — в блоке с ценами выше. Итоговую сумму фиксируем после фото или короткого осмотра.',
    },
    {
      question: 'Сколько сохнет диван?',
      answer:
        'Обычно несколько часов; точнее — по типу ткани, температуре и влажности в комнате. Рекомендуем проветривание и не нагружать обивку до полного высыхания.',
    },
    {
      question: 'Чем отличается профессиональная чистка от бытовой?',
      answer:
        'Извлечение грязи из толщины обивки, контроль влаги и растворов, безопасная схема для сложных пятен.',
    },
    {
      question: 'Сколько длятся работы?',
      answer: 'От часа до двух в типовом случае.',
    },
  ] as FaqItem[],
  rightColumn: [
    {
      question: 'Что входит в базовую химчистку?',
      answer:
        'Механическая подготовка, влажная чистка, работа с доступными пятнами в рамках заказа, антисептическая обработка по протоколу, (сушка оплачивается отдельно), и как правило занимает 60-90 минут',
    },
    {
      question: 'Можно в выходной?',
      answer: 'Да, если так заложено в график — укажите желаемое окно в заявке.',
    },
    {
      question: 'Будет ли «как новый»?',
      answer:
        'Чистка заметно улучшает вид и гигиену, но не восстанавливает изношенную обивку и не убирает въевшиеся следы после бытовых экспериментов с пятновыводителями.',
    },
    {
      question: 'Останется ли запах химии?',
      answer:
        'При работе с растворителями возможен кратковременный запах; мастер предупредит заранее. После завершения рекомендуем проветривание.',
    },
  ] as FaqItem[],
};

export interface Testimonial {
  quote: string;
  authorName: string;
  authorDetail: string;
  imagePath: string;
  imageAlt: string;
}

export const testimonials = {
  subtitle: 'Отзывы',
  title: 'Нам доверяют заказчики в Тюмени.',
  items: [
    {
      quote:
        'Мастер приехал вовремя, застелил пол, объяснил про ткань. Диван высох за вечер, запаха химии почти не было.',
      authorName: 'Анна',
      authorDetail: 'Тюмень',
      imagePath: 'images/homepage-5/testimonial/reviewer-01.jpg',
      imageAlt: 'Фото клиента — отзыв о химчистке',
    },
    {
      quote:
        'Угловой диван после кота — стало заметно лучше. Предупредили, что сложный запах может потребовать второго визита, честно.',
      authorName: 'Михаил',
      authorDetail: 'Тюменская область',
      imagePath: 'images/homepage-5/testimonial/reviewer-02.jpg',
      imageAlt: 'Фото клиента — отзыв',
    },
    {
      quote:
        'Оставляли заявку через MAX, прислали фото — назвали ориентир цены. Оплата после работы, как обещали.',
      authorName: 'Елена',
      authorDetail: 'Тюмень',
      imagePath: 'images/homepage-5/testimonial/reviewer-03.jpg',
      imageAlt: 'Фото клиента — отзыв',
    },
    {
      quote:
        'Чистили кресла в офисе в тот же день. Аккуратно, без лишней воды на ламинате.',
      authorName: 'ИП «Логистик»',
      authorDetail: 'Тюмень',
      imagePath: 'images/homepage-5/testimonial/reviewer-04.jpg',
      imageAlt: 'Логотип или фото заказчика B2B',
    },
  ] as Testimonial[],
  ratingValue: '5,0',
  ratingCaption: 'средняя оценка по отзывам клиентов',
};

export interface ClientLogo {
  hoverImagePath: string;
  greyImagePath: string;
  visuallyHiddenTitle: string;
  alt: string;
}

export const clientLogos: ClientLogo[] = Array.from({ length: 10 }, (_, idx) => {
  const i = idx + 1;
  const n = String(i).padStart(2, '0');
  return {
    hoverImagePath: `images/homepage-4/client/client-global-${n}.png`,
    greyImagePath: `images/homepage-4/client/client-grey-${n}.png`,
    visuallyHiddenTitle: `Партнёр ${i}`,
    alt: `Логотип партнёра ${i} — иллюстрация блока доверия`,
  };
});

export interface BlogPost {
  imagePath: string;
  imageAlt: string;
  categoryLabel: string;
  categoryUrl: string;
  dateLabel: string;
  authorLine: string;
  title: string;
  url: string;
  excerpt: string;
}

export const blog = {
  subtitle: 'Полезное',
  title: 'Материалы для заказчиков',
  posts: [
    {
      imagePath: 'images/homepage-2/blog/blog-01.jpg',
      imageAlt: 'Уход за диваном после чистки',
      categoryLabel: 'Советы',
      categoryUrl: homeUrl,
      dateLabel: '10 минут чтения',
      authorLine: 'Чисто Тюмень',
      title: 'Как ускорить сушку и сохранить ворс после химчистки',
      url: homeUrl,
      excerpt:
        'Проветривание, нагрузка на обивку и типичные ошибки в первые часы после визита мастера.',
    },
    {
      imagePath: 'images/homepage-2/blog/blog-02.jpg',
      imageAlt: 'Пятна и DIY',
      categoryLabel: 'Гайд',
      categoryUrl: homeUrl,
      dateLabel: '8 минут',
      authorLine: 'Чисто Тюмень',
      title: 'Почему домашние эксперименты усложняют выведение пятен',
      url: homeUrl,
      excerpt:
        'Когда стоит звать мастера сразу и что лучше не пробовать на диване самостоятельно.',
    },
    {
      imagePath: 'images/homepage-2/blog/blog-03.jpg',
      imageAlt: 'Запах и животные',
      categoryLabel: 'Здоровье',
      categoryUrl: homeUrl,
      dateLabel: '12 минут',
      authorLine: 'Чисто Тюмень',
      title: 'Что реально помогает при запахе мочи на обивке',
      url: homeUrl,
      excerpt:
        'Связка основной чистки и целевых средств — без обещаний «как с витрины».',
    },
    {
      imagePath: 'images/homepage-2/blog/blog-04.jpg',
      imageAlt: 'График',
      categoryLabel: 'Сервис',
      categoryUrl: homeUrl,
      dateLabel: '6 минут',
      authorLine: 'Чисто Тюмень',
      title: 'Как мы планируем выезд по Тюмени и области',
      url: homeUrl,
      excerpt: 'Окна 8:00–22:00 и согласование времени без лишних ожиданий.',
    },
    {
      imagePath: 'images/homepage-2/blog/blog-05.jpg',
      imageAlt: 'Кожа',
      categoryLabel: 'Материалы',
      categoryUrl: homeUrl,
      dateLabel: '9 минут',
      authorLine: 'Чисто Тюмень',
      title: 'Особенности чистки кожи и кожзама',
      url: homeUrl,
      excerpt:
        'Тест совместимости, увлажнение и то, чего избегаем в домашних условиях.',
    },
  ] as BlogPost[],
  seeAllLabel: 'Все материалы',
  seeAllUrl: '/posts',
};

export interface InstagramItem {
  url: string;
  imagePath: string;
  alt: string;
}

export const footer = {
  columnOne: [
    { label: 'Главная', url: homeUrl },
    { label: 'Услуги', url: uslugiUrl },
    { label: 'Контакты', url: contactUrl },
  ] as NavLink[],
  columnTwo: [
    { label: 'Политика конфиденциальности', url: '/privacy' },
    { label: 'Пользовательское соглашение', url: '/terms' },
    { label: 'MAX', url: tg },
  ] as NavLink[],
  logoPath: 'images/favicon.svg',
  logoAlt: site.brand,
  instagram: [
    { url: '#', imagePath: 'images/footer/img-01.jpg', alt: 'Фото работы 1' },
    { url: '#', imagePath: 'images/footer/img-02.jpg', alt: 'Фото работы 2' },
    { url: '#', imagePath: 'images/footer/img-03.jpg', alt: 'Фото работы 3' },
    { url: '#', imagePath: 'images/footer/img-04.jpg', alt: 'Фото работы 4' },
    { url: '#', imagePath: 'images/footer/img-05.jpg', alt: 'Фото работы 5' },
    { url: '#', imagePath: 'images/footer/img-06.jpg', alt: 'Фото работы 6' },
  ] as InstagramItem[],
  email: 'info@chistotyumen.ru',
  emailUrl: 'mailto:info@chistotyumen.ru',
  phoneDisplay: site.phone,
  addressHtml:
    'Выездная химчистка: Тюмень и Тюменская область<br>Заявки по телефону и в MAX.',
  copyrightLine: ` © ${new Date().getFullYear()} ${site.brand}. Все права защищены.`,
  facebookUrl: '#',
  telegramUrl: tg,
};
