// Данные посадочных (кластерных) страниц.
// Каждая страница — копия главной, но с собственным поисковым интентом.
// Общие ассеты (портфолио, логотипы, отзывы, блог, футер) переиспользуются из home.ts,
// меняется только интент-текст (hero, услуги, о нас, цены, FAQ, meta).

import {
  site,
  header,
  ihboxItems,
  portfolioSlides,
  staticBoxes,
  testimonials,
  clientLogos,
  blog,
  footer,
  type HeroSlide,
  type ServiceCard,
  type MarqueeItem,
  type PricingPlan,
  type FaqItem,
} from './home';

const tg = site.telegramUrl;
const phoneUrl = `tel:${site.phoneTel}`;

export interface ClusterMeta {
  title: string;
  description: string;
}

export interface ClusterData {
  meta: ClusterMeta;
  header: typeof header;
  heroSlides: HeroSlide[];
  services: {
    subtitle: string;
    title: string;
    fidNumber: string;
    fidTitle: string;
    cards: ServiceCard[];
    phoneTel: string;
  };
  marquee: MarqueeItem[];
  about: {
    videoUrl: string;
    videoLinkLabel: string;
    subtitle: string;
    title: string;
    paragraphs: string[];
    signatureImagePath: string;
    signatureImageAlt: string;
  };
  ihboxItems: typeof ihboxItems;
  portfolioSlides: typeof portfolioSlides;
  staticBoxes: typeof staticBoxes;
  aboutOffer: {
    phoneDisplay: string;
    phoneUrl: string;
    subtitle: string;
    titleBeforeRotate: string;
    rotatingWords: string[];
    sideBadgeTitle: string;
  };
  pricing: {
    subtitle: string;
    title: string;
    intro: string;
    headlinePricePrefix: string;
    headlinePriceAmount: string;
    headlinePriceSuffix: string;
    footnote: string;
    plans: PricingPlan[];
  };
  faq: {
    anchorId: string;
    leftAccordionId: string;
    rightAccordionId: string;
    subtitle: string;
    title: string;
    intro: string;
    leftColumn: FaqItem[];
    rightColumn: FaqItem[];
  };
  testimonials: typeof testimonials;
  clientLogos: typeof clientLogos;
  blog: typeof blog;
  footer: typeof footer;
}

// Конфиг с интент-текстом одного кластера. Всё, что не задано, берётся общим.
interface ClusterConfig {
  meta: ClusterMeta;
  heroSlides: HeroSlide[];
  servicesTitle: string;
  servicesSubtitle: string;
  fidTitle: string;
  serviceCards: ServiceCard[];
  marquee: string[];
  aboutTitle: string;
  aboutParagraphs: string[];
  offerSubtitle: string;
  offerTitleBeforeRotate: string;
  offerRotatingWords: string[];
  offerBadge: string;
  pricingTitle: string;
  pricingIntro: string;
  pricingAmount: string;
  pricingFootnote: string;
  pricingPlans: PricingPlan[];
  faqTitle: string;
  faqIntro: string;
  faqLeft: FaqItem[];
  faqRight: FaqItem[];
  ihboxTitles: string[];
  portfolio: { categoryLabel: string; titleText: string; imageAlt: string }[];
  testimonialsTitle: string;
  testimonialItems: {
    quote: string;
    authorName: string;
    authorDetail: string;
    imageAlt: string;
  }[];
  staticBoxTitle: string;
  staticBoxSteps: { title: string; description: string; foregroundImageAlt: string }[];
}

function buildCluster(cfg: ClusterConfig): ClusterData {
  return {
    meta: cfg.meta,
    header,
    heroSlides: cfg.heroSlides,
    services: {
      subtitle: cfg.servicesSubtitle,
      title: cfg.servicesTitle,
      fidNumber: '2',
      fidTitle: cfg.fidTitle,
      cards: cfg.serviceCards,
      phoneTel: site.phoneTel,
    },
    marquee: cfg.marquee.map((text) => ({ text })),
    about: {
      videoUrl: 'https://www.youtube.com/watch?v=Sv2_JktdvmQ',
      videoLinkLabel: 'Смотреть процесс работы',
      subtitle: 'Чисто Тюмень',
      title: cfg.aboutTitle,
      paragraphs: cfg.aboutParagraphs,
      signatureImagePath: 'images/homepage-5/sign.png',
      signatureImageAlt: 'Подпись компании Чисто Тюмень',
    },
    ihboxItems: ihboxItems.map((item, i) => ({
      ...item,
      title: cfg.ihboxTitles[i] ?? item.title,
    })),
    portfolioSlides: portfolioSlides.map((slide, i) => {
      const p = cfg.portfolio[i];
      return p
        ? { ...slide, categoryLabel: p.categoryLabel, titleText: p.titleText, imageAlt: p.imageAlt }
        : slide;
    }),
    staticBoxes: {
      ...staticBoxes,
      title: cfg.staticBoxTitle,
      boxes: staticBoxes.boxes.map((box, i) => {
        const s = cfg.staticBoxSteps[i];
        return s
          ? { ...box, title: s.title, description: s.description, foregroundImageAlt: s.foregroundImageAlt }
          : box;
      }),
    },
    aboutOffer: {
      phoneDisplay: site.phone,
      phoneUrl,
      subtitle: cfg.offerSubtitle,
      titleBeforeRotate: cfg.offerTitleBeforeRotate,
      rotatingWords: cfg.offerRotatingWords,
      sideBadgeTitle: cfg.offerBadge,
    },
    pricing: {
      subtitle: 'Ориентиры по ценам',
      title: cfg.pricingTitle,
      intro: cfg.pricingIntro,
      headlinePricePrefix: 'от',
      headlinePriceAmount: cfg.pricingAmount,
      headlinePriceSuffix: '',
      footnote: cfg.pricingFootnote,
      plans: cfg.pricingPlans,
    },
    faq: {
      anchorId: 'faq',
      leftAccordionId: 'faq-accordion-a',
      rightAccordionId: 'faq-accordion-b',
      subtitle: 'Заказчикам',
      title: cfg.faqTitle,
      intro: cfg.faqIntro,
      leftColumn: cfg.faqLeft,
      rightColumn: cfg.faqRight,
    },
    testimonials: {
      ...testimonials,
      title: cfg.testimonialsTitle,
      items: testimonials.items.map((item, i) => {
        const t = cfg.testimonialItems[i];
        return t
          ? { ...item, quote: t.quote, authorName: t.authorName, authorDetail: t.authorDetail, imageAlt: t.imageAlt }
          : item;
      }),
    },
    clientLogos,
    blog,
    footer,
  };
}

// ── Химчистка диванов ─────────────────────────────────────────────────────
const divanov = buildCluster({
  meta: {
    title: 'Химчистка диванов в Тюмени на дому — цена от 3 500 ₽ | Чисто Тюмень',
    description:
      'Выездная химчистка дивана на дому в Тюмени: прямые, угловые и П‑образные модели. Экстракция грязи, работа с пятнами, сушка осушителем. Ориентир по цене после фото.',
  },
  heroSlides: [
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-03.png',
      isPrimaryHeading: true,
      titleLines: ['Химчистка диванов', 'в Тюмени на дому'],
      descriptionLines: [
        'Чистим прямые, угловые и П‑образные диваны с выездом. Сушка промышленным осушителем включена в работу.',
      ],
      ctaLabel: 'Вызвать мастера',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-02.png',
      isPrimaryHeading: false,
      titleLines: ['Чистка дивана', 'с выездом по городу'],
      descriptionLines: [
        'Экстракция грязи из обивки, точечное пятновыведение и безопасная химия для семей с детьми и питомцами.',
      ],
      ctaLabel: 'Рассчитать по фото',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-01.png',
      isPrimaryHeading: false,
      titleLines: ['Тюмень и область', 'удобное время визита'],
      descriptionLines: [
        'Оставьте заявку — подскажем срок, ориентир по стоимости чистки дивана и график выезда.',
      ],
      ctaLabel: 'Написать в MAX',
      ctaUrl: tg,
    },
  ],
  servicesSubtitle: 'Что делаем',
  servicesTitle: 'Химчистка диванов',
  fidTitle: 'часа в среднем на чистку одного дивана — в типовом случае',
  serviceCards: [
    {
      number: '01',
      category: 'Прямые диваны',
      title: 'Чистка дивана на дому',
      description: 'Экстракция грязи, доступные пятна по согласованию, безопасная сушка.',
      imagePath: 'images/homepage-5/service/service-01.jpg',
      imageAlt: 'Химчистка прямого дивана на дому — иллюстрация услуги',
      detailUrl: tg,
    },
    {
      number: '02',
      category: 'Угловые диваны',
      title: 'Большой и угловой диван',
      description: 'Обрабатываем весь объём обивки и посадочные места углового дивана.',
      imagePath: 'images/homepage-5/service/service-03.jpg',
      imageAlt: 'Химчистка углового дивана',
      detailUrl: tg,
    },
    {
      number: '03',
      category: 'Пятна и запах',
      title: 'Пятновыведение обивки',
      description: 'Диагностика типа пятна, целевые средства, нейтрализация запахов.',
      imagePath: 'images/homepage-5/service/service-05.jpg',
      imageAlt: 'Пятновыведение на диване',
      detailUrl: tg,
    },
    {
      number: '04',
      category: 'Кожа и кожзам',
      title: 'Уход за кожаной обивкой',
      description: 'Деликатная чистка кожи и кожзама с тестом совместимости.',
      imagePath: 'images/homepage-5/service/service-02.jpg',
      imageAlt: 'Химчистка кожаного дивана',
      detailUrl: tg,
    },
  ],
  marquee: ['Химчистка дивана', 'Чистка дивана на дому', 'Выезд мастера', 'Результат до/после'],
  aboutTitle: 'Почему заказывают химчистку дивана у нас.',
  aboutParagraphs: [
    'Чистим диваны на дому и в офисах по Тюмени и области: от компактных прямых моделей до больших угловых и П‑образных секций. Работаем аккуратно, застилаем пол.',
    'Перед началом согласуем риски; для детей и питомцев подбираем безопасную химию. Оплата — после выполнения работы, способы обсуждаем заранее.',
  ],
  offerSubtitle: 'Режим работы и заявки',
  offerTitleBeforeRotate: 'Делаем ваш диван ',
  offerRotatingWords: ['свежим', 'ухоженным', 'безопасным для семьи', 'готовым к использованию быстрее'],
  offerBadge: 'от 3 500',
  pricingTitle: 'Стоимость химчистки дивана в Тюмени',
  pricingIntro:
    'Цена зависит от типа механизма, числа посадочных мест и фактической ширины дивана. Ниже — ориентиры; точную стоимость фиксируем после фото или осмотра.',
  pricingAmount: '3 500',
  pricingFootnote:
    'Минимальная сумма заказа, условия выезда и тариф за город уточняйте при звонке или в мессенджере.',
  pricingPlans: [
    {
      name: 'Прямой диван 2–3 места',
      price: 'от 3 500',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Влажная чистка с экстракцией' },
        { hasCheckIcon: true, text: 'Доступные пятна в рамках заказа' },
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
        { hasCheckIcon: true, text: 'Большой объём обивки' },
        { hasCheckIcon: true, text: 'Удаление запаха — отдельная услуга' },
        { hasCheckIcon: true, text: 'Деликатные ткани + 30% к стоимости' },
        { hasCheckIcon: true, text: 'Работа под ключ' },
      ],
      ctaLabel: 'Написать нам',
      ctaUrl: tg,
      featured: false,
    },
  ],
  ihboxTitles: ['Прямые диваны', 'Угловые диваны', 'Кожаные диваны', 'Диван‑кровати', 'Кресла'],
  portfolio: [
    { categoryLabel: 'До/после', titleText: 'Прямой диван', imageAlt: 'Прямой диван до и после химчистки' },
    { categoryLabel: 'Пятна', titleText: 'Кофе и сок на обивке', imageAlt: 'Пятновыведение на диване' },
    { categoryLabel: 'Угловой', titleText: 'Большой угловой диван', imageAlt: 'Угловой диван после чистки' },
    { categoryLabel: 'Кресла', titleText: 'Комплект мягкой мебели', imageAlt: 'Диван и кресла — итог чистки' },
    { categoryLabel: 'Механизм', titleText: 'Диван‑кровать', imageAlt: 'Чистка раскладного дивана' },
    { categoryLabel: 'Кожа', titleText: 'Кожаный диван', imageAlt: 'Уход за кожаной обивкой дивана' },
    { categoryLabel: 'Офис', titleText: 'Диван в приёмной', imageAlt: 'Химчистка дивана в офисе' },
    { categoryLabel: 'Тюмень', titleText: 'Выезд по городу', imageAlt: 'Выездная химчистка дивана в Тюмени' },
  ],
  testimonialsTitle: 'Отзывы о химчистке диванов в Тюмени.',
  testimonialItems: [
    {
      quote:
        'Чистили прямой диван на дому — мастер застелил пол, объяснил про ткань. Высох за вечер, запаха химии почти не было.',
      authorName: 'Анна',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о химчистке дивана',
    },
    {
      quote:
        'Угловой диван после кота — стало заметно лучше. Честно предупредили, что сложный запах может потребовать второго визита.',
      authorName: 'Михаил',
      authorDetail: 'Тюменская область',
      imageAlt: 'Отзыв о чистке углового дивана',
    },
    {
      quote:
        'Оставил заявку через MAX, прислал фото дивана — назвали ориентир цены. Оплата после работы, как обещали.',
      authorName: 'Елена',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о заказе химчистки дивана',
    },
    {
      quote:
        'Освежили кожаный диван, сделали тест на незаметном участке. Аккуратно, без разводов.',
      authorName: 'Дмитрий',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о чистке кожаного дивана',
    },
  ],
  staticBoxTitle: 'Как проходит химчистка дивана',
  staticBoxSteps: [
    {
      title: 'Осмотр и тест обивки',
      description:
        'Определяем тип ткани дивана и степень загрязнения, пробуем состав на скрытом участке.',
      foregroundImageAlt: 'Этап 1 — осмотр обивки дивана',
    },
    {
      title: 'Экстракция грязи',
      description:
        'Сухая подготовка и влажная чистка с извлечением грязи из наполнителя дивана.',
      foregroundImageAlt: 'Этап 2 — экстракция грязи из дивана',
    },
    {
      title: 'Пятна и загрязнения',
      description:
        'Работаем с пятнами на подлокотниках и сиденьях подбором пятновыводителя под тип пятна.',
      foregroundImageAlt: 'Этап 3 — пятновыведение на диване',
    },
    {
      title: 'Нейтрализация и сушка',
      description:
        'Убираем остатки растворов, сушим диван осушителем и расчёсываем ворс обивки.',
      foregroundImageAlt: 'Этап 4 — сушка дивана',
    },
  ],
  faqTitle: 'Вопросы о химчистке дивана',
  faqIntro:
    'Коротко о цене, сушке и сроках чистки дивана. Если не найдёте ответ — свяжитесь с нами.',
  faqLeft: [
    {
      question: 'Сколько стоит химчистка дивана?',
      answer:
        'Зависит от модели и числа посадочных мест; ориентиры — в блоке с ценами выше. Итог фиксируем после фото или короткого осмотра.',
    },
    {
      question: 'Сколько сохнет диван после чистки?',
      answer:
        'Обычно несколько часов; точнее — по типу ткани и влажности в комнате. Рекомендуем проветривание и не нагружать обивку до полного высыхания.',
    },
    {
      question: 'Чистите угловые и П‑образные диваны?',
      answer: 'Да, работаем с любым размером — от прямых 2–3 места до больших угловых и П‑образных секций.',
    },
    {
      question: 'Сколько длится чистка дивана?',
      answer: 'От часа до двух в типовом случае.',
    },
  ],
  faqRight: [
    {
      question: 'Что входит в базовую химчистку дивана?',
      answer:
        'Механическая подготовка, влажная чистка, работа с доступными пятнами, антисептическая обработка по протоколу. Занимает 60–90 минут (сушка оплачивается отдельно).',
    },
    {
      question: 'Работаете с пятнами и запахом?',
      answer: 'Да, диагностируем тип загрязнения и подбираем целевые средства. Сложные случаи — по согласованию.',
    },
    {
      question: 'Будет ли диван «как новый»?',
      answer:
        'Чистка заметно улучшает вид и гигиену, но не восстанавливает изношенную обивку и въевшиеся следы после домашних экспериментов.',
    },
    {
      question: 'Выезжаете за город?',
      answer: 'Да, по Тюмени и области. Тариф за выезд уточняйте в заявке.',
    },
  ],
});

// ── Химчистка ковров ──────────────────────────────────────────────────────
const kovrov = buildCluster({
  meta: {
    title: 'Химчистка ковров в Тюмени — чистка ковров и паласов | Чисто Тюмень',
    description:
      'Профессиональная химчистка ковров, паласов и ковровых дорожек в Тюмени. Чистка на дому или с вывозом, удаление пятен и запахов, аккуратная сушка. Цена — после осмотра.',
  },
  heroSlides: [
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-03.png',
      isPrimaryHeading: true,
      titleLines: ['Химчистка ковров', 'в Тюмени'],
      descriptionLines: [
        'Чистим ковры, паласы и ковровые дорожки на дому или с вывозом. Убираем пыль, пятна и запахи.',
      ],
      ctaLabel: 'Вызвать мастера',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-02.png',
      isPrimaryHeading: false,
      titleLines: ['Чистка ковра', 'на дому и с вывозом'],
      descriptionLines: [
        'Подберём формат: обработка на месте без демонтажа или забор ковра с возвратом после сушки.',
      ],
      ctaLabel: 'Рассчитать по фото',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-01.png',
      isPrimaryHeading: false,
      titleLines: ['Тюмень и область', 'удобное время визита'],
      descriptionLines: [
        'Оставьте заявку — подскажем срок, ориентир по цене за квадратный метр и график выезда.',
      ],
      ctaLabel: 'Написать в MAX',
      ctaUrl: tg,
    },
  ],
  servicesSubtitle: 'Что делаем',
  servicesTitle: 'Химчистка ковров',
  fidTitle: 'часа в среднем на чистку одного ковра — в типовом случае',
  serviceCards: [
    {
      number: '01',
      category: 'Ковры',
      title: 'Чистка ковра на дому',
      description: 'Глубокая экстракция пыли и грязи из ворса без демонтажа.',
      imagePath: 'images/homepage-5/service/service-05.jpg',
      imageAlt: 'Химчистка ковра на дому — иллюстрация услуги',
      detailUrl: tg,
    },
    {
      number: '02',
      category: 'Паласы',
      title: 'Чистка паласов и дорожек',
      description: 'Обрабатываем паласы и ковровые дорожки, освежаем цвет ворса.',
      imagePath: 'images/homepage-5/service/service-04.jpg',
      imageAlt: 'Химчистка паласа',
      detailUrl: tg,
    },
    {
      number: '03',
      category: 'Пятна и запах',
      title: 'Удаление пятен с ковра',
      description: 'Диагностика загрязнения, целевые средства, нейтрализация запахов.',
      imagePath: 'images/homepage-5/service/service-06.jpg',
      imageAlt: 'Удаление пятен с ковра',
      detailUrl: tg,
    },
    {
      number: '04',
      category: 'Ковролин',
      title: 'Покрытия и офисы',
      description: 'Чистим напольные покрытия в квартирах и коммерческих помещениях.',
      imagePath: 'images/homepage-5/service/service-01.jpg',
      imageAlt: 'Чистка ковролина',
      detailUrl: tg,
    },
  ],
  marquee: ['Химчистка ковров', 'Чистка паласов', 'Выезд мастера', 'Результат до/после'],
  aboutTitle: 'Почему заказывают химчистку ковров у нас.',
  aboutParagraphs: [
    'Чистим ковры, паласы и ковровые дорожки в Тюмени и области — на дому или с вывозом. Возвращаем ворсу свежесть и убираем въевшуюся пыль.',
    'Перед работой определяем тип ворса и согласуем риски; для семей с детьми и питомцами используем безопасную химию. Оплата — после результата.',
  ],
  offerSubtitle: 'Режим работы и заявки',
  offerTitleBeforeRotate: 'Делаем ваш ковёр ',
  offerRotatingWords: ['свежим', 'чистым', 'без пятен и запаха', 'приятным на ощупь'],
  offerBadge: 'по м²',
  pricingTitle: 'Стоимость химчистки ковров в Тюмени',
  pricingIntro:
    'Цена зависит от площади, типа и высоты ворса, а также степени загрязнения. Ниже — ориентиры; точную стоимость фиксируем после осмотра или фото.',
  pricingAmount: '150',
  pricingFootnote:
    'Минимальная сумма заказа, условия вывоза и тариф за город уточняйте при звонке или в мессенджере.',
  pricingPlans: [
    {
      name: 'Ковёр на дому, за м²',
      price: 'от 150',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Экстракция пыли и грязи из ворса' },
        { hasCheckIcon: true, text: 'Доступные пятна в рамках заказа' },
        { hasCheckIcon: true, text: 'Обработка без демонтажа' },
        { hasCheckIcon: true, text: 'Сложные пятна и запахи — по согласованию' },
      ],
      ctaLabel: 'Заказать',
      ctaUrl: tg,
      featured: false,
    },
    {
      name: 'Ковёр с вывозом',
      price: 'от 250',
      period: 'за м²',
      lines: [
        { hasCheckIcon: true, text: 'Забор и доставка после сушки' },
        { hasCheckIcon: true, text: 'Промывка и глубокая чистка ворса' },
        { hasCheckIcon: true, text: 'Просушивание в цехе' },
        { hasCheckIcon: true, text: 'Расчёт по фото в MAX' },
      ],
      ctaLabel: 'Рассчитать',
      ctaUrl: tg,
      featured: true,
    },
    {
      name: 'Паласы и дорожки',
      price: 'от 120',
      period: 'за м²',
      lines: [
        { hasCheckIcon: true, text: 'Чистка паласов и ковровых дорожек' },
        { hasCheckIcon: true, text: 'Удаление запаха — отдельная услуга' },
        { hasCheckIcon: true, text: 'Деликатные материалы — по согласованию' },
        { hasCheckIcon: true, text: 'Работа под ключ' },
      ],
      ctaLabel: 'Написать нам',
      ctaUrl: tg,
      featured: false,
    },
  ],
  ihboxTitles: ['Ковры', 'Паласы', 'Дорожки', 'Ковролин', 'Циновки'],
  portfolio: [
    { categoryLabel: 'До/после', titleText: 'Ковёр с длинным ворсом', imageAlt: 'Ковёр до и после химчистки' },
    { categoryLabel: 'Пятна', titleText: 'Пятна на паласе', imageAlt: 'Удаление пятен с паласа' },
    { categoryLabel: 'Дорожка', titleText: 'Ковровая дорожка', imageAlt: 'Чистка ковровой дорожки' },
    { categoryLabel: 'Вывоз', titleText: 'Чистка в цехе', imageAlt: 'Ковёр после мойки с вывозом' },
    { categoryLabel: 'Запах', titleText: 'Свежесть ворса', imageAlt: 'Нейтрализация запаха на ковре' },
    { categoryLabel: 'Шерсть', titleText: 'Шерстяной ковёр', imageAlt: 'Деликатная чистка шерстяного ковра' },
    { categoryLabel: 'Офис', titleText: 'Ковролин в офисе', imageAlt: 'Химчистка ковролина в офисе' },
    { categoryLabel: 'Тюмень', titleText: 'Выезд по городу', imageAlt: 'Выездная химчистка ковров в Тюмени' },
  ],
  testimonialsTitle: 'Отзывы о химчистке ковров в Тюмени.',
  testimonialItems: [
    {
      quote:
        'Забрали ковёр на чистку и вернули через два дня — пыль ушла, цвет стал ярче. Очень довольны результатом.',
      authorName: 'Ольга',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о химчистке ковра с вывозом',
    },
    {
      quote:
        'Чистили большой палас прямо дома, без демонтажа. Быстро, аккуратно, разводов не осталось.',
      authorName: 'Сергей',
      authorDetail: 'Тюменская область',
      imageAlt: 'Отзыв о чистке паласа на дому',
    },
    {
      quote:
        'Отправила фото ковра в MAX, сразу назвали цену за квадратный метр. Запах после животного пропал.',
      authorName: 'Наталья',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о выведении запаха с ковра',
    },
    {
      quote:
        'Освежили ковровые дорожки в коридоре в тот же день. Оплата после работы, как договаривались.',
      authorName: 'Игорь',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о чистке ковровых дорожек',
    },
  ],
  staticBoxTitle: 'Как проходит химчистка ковра',
  staticBoxSteps: [
    {
      title: 'Осмотр и тест ворса',
      description:
        'Определяем материал ковра и стойкость краски, проверяем состав на незаметном крае.',
      foregroundImageAlt: 'Этап 1 — осмотр ковра',
    },
    {
      title: 'Глубокая мойка ворса',
      description:
        'Выбиваем пыль, промываем ворс и основу ковра с извлечением грязи из глубины.',
      foregroundImageAlt: 'Этап 2 — мойка ворса ковра',
    },
    {
      title: 'Пятна и запахи',
      description:
        'Выводим пятна и нейтрализуем запахи, в том числе следы после домашних животных.',
      foregroundImageAlt: 'Этап 3 — выведение пятен с ковра',
    },
    {
      title: 'Сушка и возврат',
      description:
        'Сушим ковёр, приводим ворс в порядок и возвращаем чистым в оговорённый срок.',
      foregroundImageAlt: 'Этап 4 — сушка ковра',
    },
  ],
  faqTitle: 'Вопросы о химчистке ковров',
  faqIntro:
    'Коротко о цене за метр, сушке и вывозе ковра. Если не найдёте ответ — свяжитесь с нами.',
  faqLeft: [
    {
      question: 'Сколько стоит химчистка ковра?',
      answer:
        'Считаем по площади (за м²); ориентиры — в блоке с ценами выше. Итог зависит от типа ворса и загрязнения, фиксируем после осмотра или фото.',
    },
    {
      question: 'Чистите на дому или с вывозом?',
      answer:
        'Возможны оба формата: обработка на месте без демонтажа или забор ковра с возвратом после сушки в цехе.',
    },
    {
      question: 'Убираете пятна и запах?',
      answer: 'Да, диагностируем тип загрязнения и подбираем средства. Сложные запахи — как отдельная услуга.',
    },
    {
      question: 'Сколько сохнет ковёр?',
      answer: 'На дому — несколько часов; при чистке с вывозом отдаём уже просушенным.',
    },
  ],
  faqRight: [
    {
      question: 'Чистите паласы и ковровые дорожки?',
      answer: 'Да, работаем с паласами, дорожками и коврами разного размера и типа ворса.',
    },
    {
      question: 'Не сядет ли ковёр после чистки?',
      answer:
        'Подбираем режим под материал и контролируем влагу. Для деликатных ковров используем щадящую технологию.',
    },
    {
      question: 'Будет ли ковёр «как новый»?',
      answer:
        'Чистка заметно улучшает вид и гигиену, но не восстанавливает вытертый или выгоревший ворс.',
    },
    {
      question: 'Выезжаете за город?',
      answer: 'Да, по Тюмени и области. Тариф за выезд уточняйте в заявке.',
    },
  ],
});

// ── Химчистка матрасов ────────────────────────────────────────────────────
const matrasov = buildCluster({
  meta: {
    title: 'Химчистка матрасов в Тюмени на дому — цена от 2 500 ₽ | Чисто Тюмень',
    description:
      'Выездная химчистка матраса на дому в Тюмени: удаление пятен, запаха и следов мочи, гигиеническая обработка. Детские и ортопедические матрасы. Ориентир по цене после фото.',
  },
  heroSlides: [
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-03.png',
      isPrimaryHeading: true,
      titleLines: ['Химчистка матрасов', 'в Тюмени на дому'],
      descriptionLines: [
        'Гигиеническая чистка матраса с выездом: убираем пятна, запахи и пылевых клещей. Сушка осушителем включена.',
      ],
      ctaLabel: 'Вызвать мастера',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-02.png',
      isPrimaryHeading: false,
      titleLines: ['Чистка матраса', 'от пятен и запаха'],
      descriptionLines: [
        'Работаем с ортопедическими, детскими и ватными матрасами. Удаляем следы мочи и застарелые пятна.',
      ],
      ctaLabel: 'Рассчитать по фото',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-01.png',
      isPrimaryHeading: false,
      titleLines: ['Тюмень и область', 'удобное время визита'],
      descriptionLines: [
        'Оставьте заявку — подскажем срок, ориентир по стоимости чистки матраса и график выезда.',
      ],
      ctaLabel: 'Написать в MAX',
      ctaUrl: tg,
    },
  ],
  servicesSubtitle: 'Что делаем',
  servicesTitle: 'Химчистка матрасов',
  fidTitle: 'часа в среднем на чистку одного матраса — в типовом случае',
  serviceCards: [
    {
      number: '01',
      category: 'Матрасы',
      title: 'Чистка матраса на дому',
      description: 'Экстракция грязи, гигиеническая обработка обеих сторон, безопасная сушка.',
      imagePath: 'images/homepage-5/service/service-02.jpg',
      imageAlt: 'Химчистка матраса на дому — иллюстрация услуги',
      detailUrl: tg,
    },
    {
      number: '02',
      category: 'Следы мочи',
      title: 'Удаление пятен и запаха',
      description: 'Целевые средства против следов мочи и застарелых пятен на матрасе.',
      imagePath: 'images/homepage-5/service/service-06.jpg',
      imageAlt: 'Удаление пятен с матраса',
      detailUrl: tg,
    },
    {
      number: '03',
      category: 'Детские матрасы',
      title: 'Безопасная химия',
      description: 'Для детских и ортопедических матрасов подбираем деликатные средства.',
      imagePath: 'images/homepage-5/service/service-03.jpg',
      imageAlt: 'Химчистка детского матраса',
      detailUrl: tg,
    },
    {
      number: '04',
      category: 'Наматрасники',
      title: 'Чехлы и топперы',
      description: 'Освежаем наматрасники, чехлы и топперы вместе с матрасом.',
      imagePath: 'images/homepage-5/service/service-05.jpg',
      imageAlt: 'Химчистка наматрасника и топпера',
      detailUrl: tg,
    },
  ],
  marquee: ['Химчистка матраса', 'Чистка от пятен', 'Выезд мастера', 'Результат до/после'],
  aboutTitle: 'Почему заказывают химчистку матраса у нас.',
  aboutParagraphs: [
    'Чистим матрасы на дому в Тюмени и области: ортопедические, детские, ватные. Убираем пятна, запахи и снижаем количество пылевых клещей — это про гигиену сна.',
    'Перед началом определяем тип наполнителя и согласуем риски; для детей подбираем безопасную химию. Оплата — после выполнения работы.',
  ],
  offerSubtitle: 'Режим работы и заявки',
  offerTitleBeforeRotate: 'Делаем ваш матрас ',
  offerRotatingWords: ['чистым', 'гигиеничным', 'без запаха', 'безопасным для сна'],
  offerBadge: 'от 2 500',
  pricingTitle: 'Стоимость химчистки матраса в Тюмени',
  pricingIntro:
    'Цена зависит от размера, наполнителя и степени загрязнения матраса. Ниже — ориентиры; точную стоимость фиксируем после фото или осмотра.',
  pricingAmount: '2 500',
  pricingFootnote:
    'Минимальная сумма заказа, условия выезда и тариф за город уточняйте при звонке или в мессенджере.',
  pricingPlans: [
    {
      name: 'Матрас односпальный',
      price: 'от 2 500',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Гигиеническая чистка с экстракцией' },
        { hasCheckIcon: true, text: 'Обработка двух сторон' },
        { hasCheckIcon: true, text: 'Сушка техникой мастера' },
        { hasCheckIcon: true, text: 'Пятна и запах — по согласованию' },
      ],
      ctaLabel: 'Заказать',
      ctaUrl: tg,
      featured: false,
    },
    {
      name: 'Матрас двуспальный',
      price: 'от 3 500',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Диагностика наполнителя' },
        { hasCheckIcon: true, text: 'Удаление следов мочи и пятен' },
        { hasCheckIcon: true, text: 'Контроль влаги и сушка' },
        { hasCheckIcon: true, text: 'Расчёт по фото в MAX' },
      ],
      ctaLabel: 'Рассчитать',
      ctaUrl: tg,
      featured: true,
    },
    {
      name: 'Детский и ортопедический',
      price: 'от 2 000',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Деликатные безопасные средства' },
        { hasCheckIcon: true, text: 'Удаление запаха — отдельная услуга' },
        { hasCheckIcon: true, text: 'Чистка чехла и наматрасника' },
        { hasCheckIcon: true, text: 'Работа под ключ' },
      ],
      ctaLabel: 'Написать нам',
      ctaUrl: tg,
      featured: false,
    },
  ],
  ihboxTitles: ['Матрасы', 'Детские матрасы', 'Ортопедические', 'Наматрасники', 'Топперы'],
  portfolio: [
    { categoryLabel: 'До/после', titleText: 'Двуспальный матрас', imageAlt: 'Матрас до и после химчистки' },
    { categoryLabel: 'Пятна', titleText: 'Следы и разводы', imageAlt: 'Удаление пятен с матраса' },
    { categoryLabel: 'Запах', titleText: 'Матрас от мочи', imageAlt: 'Чистка матраса от запаха мочи' },
    { categoryLabel: 'Детский', titleText: 'Детский матрас', imageAlt: 'Химчистка детского матраса' },
    { categoryLabel: 'Гигиена', titleText: 'Сон без пылевых клещей', imageAlt: 'Антибактериальная чистка матраса' },
    { categoryLabel: 'Ортопед', titleText: 'Ортопедический матрас', imageAlt: 'Чистка ортопедического матраса' },
    { categoryLabel: 'Чехол', titleText: 'Наматрасник и чехол', imageAlt: 'Химчистка наматрасника' },
    { categoryLabel: 'Тюмень', titleText: 'Выезд по городу', imageAlt: 'Выездная химчистка матраса в Тюмени' },
  ],
  testimonialsTitle: 'Отзывы о химчистке матрасов в Тюмени.',
  testimonialItems: [
    {
      quote:
        'Почистили матрас от старых пятен — стало заметно свежее. Мастер объяснил, как проветрить перед сном.',
      authorName: 'Мария',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о химчистке матраса',
    },
    {
      quote:
        'Убрали запах мочи с детского матраса, использовали безопасную химию. Ребёнок спит спокойно.',
      authorName: 'Екатерина',
      authorDetail: 'Тюменская область',
      imageAlt: 'Отзыв о чистке детского матраса',
    },
    {
      quote:
        'Отправил фото матраса в MAX — сразу сказали цену по размеру. Приехали в удобное время.',
      authorName: 'Андрей',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о заказе химчистки матраса',
    },
    {
      quote:
        'Чистили ортопедический матрас на дому, без вывоза. Высох за несколько часов, разводов нет.',
      authorName: 'Светлана',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о чистке ортопедического матраса',
    },
  ],
  staticBoxTitle: 'Как проходит химчистка матраса',
  staticBoxSteps: [
    {
      title: 'Осмотр и тест ткани',
      description:
        'Определяем тип чехла матраса и характер пятен, пробуем состав на скрытом участке.',
      foregroundImageAlt: 'Этап 1 — осмотр матраса',
    },
    {
      title: 'Экстракция и гигиена',
      description:
        'Влажная чистка с извлечением грязи и пыли из наполнителя, обработка от пылевых клещей.',
      foregroundImageAlt: 'Этап 2 — экстракция грязи из матраса',
    },
    {
      title: 'Пятна и запах мочи',
      description:
        'Выводим следы и разводы, нейтрализуем запах мочи безопасными для сна средствами.',
      foregroundImageAlt: 'Этап 3 — выведение пятен и запаха с матраса',
    },
    {
      title: 'Нейтрализация и сушка',
      description:
        'Снимаем остатки растворов и сушим матрас, чтобы им можно было пользоваться в тот же день.',
      foregroundImageAlt: 'Этап 4 — сушка матраса',
    },
  ],
  faqTitle: 'Вопросы о химчистке матраса',
  faqIntro:
    'Коротко о цене, сушке и следах мочи на матрасе. Если не найдёте ответ — свяжитесь с нами.',
  faqLeft: [
    {
      question: 'Сколько стоит химчистка матраса?',
      answer:
        'Зависит от размера и наполнителя; ориентиры — в блоке с ценами выше. Итог фиксируем после фото или осмотра.',
    },
    {
      question: 'Убираете следы мочи и запах?',
      answer:
        'Да, применяем целевые средства против следов мочи и запаха. Застарелые случаи — по согласованию, иногда нужен повторный визит.',
    },
    {
      question: 'Чистите детские и ортопедические матрасы?',
      answer: 'Да, для детских и ортопедических матрасов подбираем деликатную безопасную химию.',
    },
    {
      question: 'Сколько сохнет матрас?',
      answer: 'Обычно несколько часов; сушим техникой мастера, рекомендуем проветривание.',
    },
  ],
  faqRight: [
    {
      question: 'Что входит в химчистку матраса?',
      answer:
        'Механическая подготовка, влажная чистка обеих сторон, работа с доступными пятнами, антисептическая обработка по протоколу.',
    },
    {
      question: 'Помогает ли чистка от пылевых клещей?',
      answer: 'Да, гигиеническая обработка снижает количество пыли и аллергенов в наполнителе.',
    },
    {
      question: 'Будет ли матрас «как новый»?',
      answer:
        'Чистка заметно улучшает гигиену и вид, но не убирает глубокие пятна, впитавшиеся в наполнитель годами.',
    },
    {
      question: 'Выезжаете за город?',
      answer: 'Да, по Тюмени и области. Тариф за выезд уточняйте в заявке.',
    },
  ],
});

// ── Химчистка мягкой мебели ───────────────────────────────────────────────
const myagkoyMebeli = buildCluster({
  meta: {
    title: 'Химчистка мягкой мебели в Тюмени на дому — цена от 3 500 ₽ | Чисто Тюмень',
    description:
      'Профессиональная химчистка мягкой мебели на дому в Тюмени: диваны, кресла, стулья и матрасы. Экстракция грязи, пятновыведение, безопасная сушка. Цена — после фото.',
  },
  heroSlides: [
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-03.png',
      isPrimaryHeading: true,
      titleLines: ['Химчистка мягкой мебели', 'в Тюмени'],
      descriptionLines: [
        'Чистим диваны, кресла, стулья и матрасы на дому и в офисах. Сушка промышленным осушителем включена в работу.',
      ],
      ctaLabel: 'Вызвать мастера',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-02.png',
      isPrimaryHeading: false,
      titleLines: ['Чистка обивки', 'любой мягкой мебели'],
      descriptionLines: [
        'Экстракция грязи из ткани, точечное пятновыведение и безопасная химия для семей с детьми и питомцами.',
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
  ],
  servicesSubtitle: 'Что делаем',
  servicesTitle: 'Химчистка мягкой мебели',
  fidTitle: 'часа в среднем на одну мебельную единицу — в типовом случае',
  serviceCards: [
    {
      number: '01',
      category: 'Диваны',
      title: 'Диваны и мягкая мебель',
      description: 'Экстракция грязи, пятна по согласованию, безопасная сушка.',
      imagePath: 'images/homepage-5/service/service-01.jpg',
      imageAlt: 'Химчистка мягкой мебели — иллюстрация услуги',
      detailUrl: tg,
    },
    {
      number: '02',
      category: 'Кресла и стулья',
      title: 'Обивка и ворс',
      description: 'Финишный уход за ворсом кресел и стульев, нейтрализация запахов.',
      imagePath: 'images/homepage-5/service/service-03.jpg',
      imageAlt: 'Химчистка кресла',
      detailUrl: tg,
    },
    {
      number: '03',
      category: 'Матрасы',
      title: 'Гигиена спальных мест',
      description: 'Чистка матрасов на дому: пятна, запахи, гигиеническая обработка.',
      imagePath: 'images/homepage-5/service/service-02.jpg',
      imageAlt: 'Химчистка матраса',
      detailUrl: tg,
    },
    {
      number: '04',
      category: 'Офис',
      title: 'Покрытия и офисы',
      description: 'Чистим мягкую мебель и напольные покрытия в коммерческих помещениях.',
      imagePath: 'images/homepage-5/service/service-05.jpg',
      imageAlt: 'Чистка мягкой мебели в офисе',
      detailUrl: tg,
    },
  ],
  marquee: ['Химчистка мягкой мебели', 'Чистка обивки', 'Выезд мастера', 'Результат до/после'],
  aboutTitle: 'Почему выбирают нашу химчистку мебели.',
  aboutParagraphs: [
    'Чистим мягкую мебель на дому и в офисах по Тюмени и области: диваны, кресла, стулья и матрасы. Работаем с обивкой любого типа — от текстиля до кожзама.',
    'Перед началом согласуем риски; для детей и питомцев подбираем безопасную химию. Оплата — после выполнения работы, способы обсуждаем заранее.',
  ],
  offerSubtitle: 'Режим работы и заявки',
  offerTitleBeforeRotate: 'Делаем вашу мебель ',
  offerRotatingWords: ['свежей', 'ухоженной', 'безопасной для семьи', 'готовой к использованию быстрее'],
  offerBadge: 'от 3 500',
  pricingTitle: 'Стоимость химчистки мягкой мебели в Тюмени',
  pricingIntro:
    'Цена зависит от типа мебели, объёма обивки и степени загрязнения. Ниже — ориентиры; точную стоимость фиксируем после фото или осмотра.',
  pricingAmount: '3 500',
  pricingFootnote:
    'Минимальная сумма заказа, условия выезда и тариф за город уточняйте при звонке или в мессенджере.',
  pricingPlans: [
    {
      name: 'Диван 2–3 места',
      price: 'от 3 500',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Влажная чистка с экстракцией' },
        { hasCheckIcon: true, text: 'Доступные пятна в рамках заказа' },
        { hasCheckIcon: true, text: 'Сушка техникой мастера' },
        { hasCheckIcon: true, text: 'Сложные пятна и запахи — по согласованию' },
      ],
      ctaLabel: 'Заказать',
      ctaUrl: tg,
      featured: false,
    },
    {
      name: 'Комплект мебели',
      price: 'от 5 500',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Диван, кресла и стулья вместе' },
        { hasCheckIcon: true, text: 'Диагностика и тест раствора' },
        { hasCheckIcon: true, text: 'Финиш и ворс' },
        { hasCheckIcon: true, text: 'Расчёт по фото в MAX' },
      ],
      ctaLabel: 'Рассчитать',
      ctaUrl: tg,
      featured: true,
    },
    {
      name: 'Кресло / стул',
      price: 'от 800',
      period: '',
      lines: [
        { hasCheckIcon: true, text: 'Чистка обивки кресел и стульев' },
        { hasCheckIcon: true, text: 'Удаление запаха — отдельная услуга' },
        { hasCheckIcon: true, text: 'Деликатные ткани — по согласованию' },
        { hasCheckIcon: true, text: 'Работа под ключ' },
      ],
      ctaLabel: 'Написать нам',
      ctaUrl: tg,
      featured: false,
    },
  ],
  ihboxTitles: ['Диваны', 'Кресла', 'Стулья', 'Матрасы', 'Пуфы'],
  portfolio: [
    { categoryLabel: 'До/после', titleText: 'Мягкая мебель', imageAlt: 'Мягкая мебель до и после химчистки' },
    { categoryLabel: 'Пятна', titleText: 'Локальные загрязнения', imageAlt: 'Пятновыведение на мягкой мебели' },
    { categoryLabel: 'Диван', titleText: 'Угловой диван', imageAlt: 'Угловой диван после чистки' },
    { categoryLabel: 'Кресла', titleText: 'Комплект кресел', imageAlt: 'Кресла после химчистки' },
    { categoryLabel: 'Матрас', titleText: 'Сон и гигиена', imageAlt: 'Чистка матраса' },
    { categoryLabel: 'Кожа', titleText: 'Кожаная обивка', imageAlt: 'Уход за кожаной мягкой мебелью' },
    { categoryLabel: 'Офис', titleText: 'Мебель в офисе', imageAlt: 'Химчистка мягкой мебели в офисе' },
    { categoryLabel: 'Тюмень', titleText: 'Выезд по городу', imageAlt: 'Выездная химчистка мягкой мебели в Тюмени' },
  ],
  testimonialsTitle: 'Отзывы о химчистке мягкой мебели в Тюмени.',
  testimonialItems: [
    {
      quote:
        'Заказали чистку всего комплекта — диван и два кресла. Приехали вовремя, работали аккуратно, мебель освежилась.',
      authorName: 'Татьяна',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о химчистке мягкой мебели',
    },
    {
      quote:
        'Убрали пятна с обивки дивана и кресел. Предупредили про сушку и запах, всё честно.',
      authorName: 'Виктор',
      authorDetail: 'Тюменская область',
      imageAlt: 'Отзыв о чистке обивки мебели',
    },
    {
      quote:
        'Отправила фото мебели в MAX — быстро посчитали стоимость. Оплата после результата.',
      authorName: 'Юлия',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о заказе химчистки мебели',
    },
    {
      quote:
        'Чистили мягкую мебель в офисе в тот же день. Аккуратно, без лишней воды на полу.',
      authorName: 'ИП «Логистик»',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв B2B о химчистке мебели',
    },
  ],
  staticBoxTitle: 'Как проходит химчистка мягкой мебели',
  staticBoxSteps: [
    {
      title: 'Осмотр комплекта',
      description:
        'Оцениваем диван, кресла и стулья, определяем тип обивки и тестируем состав на скрытом участке.',
      foregroundImageAlt: 'Этап 1 — осмотр мягкой мебели',
    },
    {
      title: 'Экстракция грязи',
      description:
        'Сухая подготовка и влажная чистка с извлечением грязи из обивки и наполнителя.',
      foregroundImageAlt: 'Этап 2 — экстракция грязи из мебели',
    },
    {
      title: 'Пятна на обивке',
      description:
        'Работаем с локальными загрязнениями на сиденьях и спинках подбором пятновыводителя.',
      foregroundImageAlt: 'Этап 3 — пятновыведение на мягкой мебели',
    },
    {
      title: 'Нейтрализация и сушка',
      description:
        'Убираем остатки растворов и сушим мебель осушителем, приводим ворс обивки в порядок.',
      foregroundImageAlt: 'Этап 4 — сушка мягкой мебели',
    },
  ],
  faqTitle: 'Вопросы о химчистке мягкой мебели',
  faqIntro:
    'Коротко о цене, сушке и сроках чистки мебели. Если не найдёте ответ — свяжитесь с нами.',
  faqLeft: [
    {
      question: 'Сколько стоит химчистка мягкой мебели?',
      answer:
        'Зависит от типа мебели и объёма обивки; ориентиры — в блоке с ценами выше. Итог фиксируем после фото или осмотра.',
    },
    {
      question: 'Какую мебель чистите?',
      answer:
        'Диваны, кресла, стулья, матрасы и другую мягкую мебель. Работаем с текстилем, кожей и кожзамом.',
    },
    {
      question: 'Сколько сохнет мебель после чистки?',
      answer:
        'Обычно несколько часов; точнее — по типу ткани и влажности. Рекомендуем проветривание и не нагружать обивку до высыхания.',
    },
    {
      question: 'Сколько длятся работы?',
      answer: 'От часа до двух в типовом случае на одну единицу.',
    },
  ],
  faqRight: [
    {
      question: 'Что входит в базовую химчистку?',
      answer:
        'Механическая подготовка, влажная чистка, работа с доступными пятнами, антисептическая обработка по протоколу. Занимает 60–90 минут (сушка оплачивается отдельно).',
    },
    {
      question: 'Работаете в офисах?',
      answer: 'Да, чистим мягкую мебель и кресла в офисах, в том числе в тот же день по договорённости.',
    },
    {
      question: 'Будет ли мебель «как новая»?',
      answer:
        'Чистка заметно улучшает вид и гигиену, но не восстанавливает изношенную обивку и въевшиеся следы.',
    },
    {
      question: 'Выезжаете за город?',
      answer: 'Да, по Тюмени и области. Тариф за выезд уточняйте в заявке.',
    },
  ],
});

// ── Химчистка стульев ─────────────────────────────────────────────────────
const stulev = buildCluster({
  meta: {
    title: 'Химчистка стульев в Тюмени — чистка стульев и кресел | Чисто Тюмень',
    description:
      'Химчистка стульев с мягкой обивкой и кресел в Тюмени: дома и в офисе. Чистка обивки, удаление пятен и запахов, аккуратная сушка. Ориентир по цене после фото.',
  },
  heroSlides: [
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-03.png',
      isPrimaryHeading: true,
      titleLines: ['Химчистка стульев', 'в Тюмени'],
      descriptionLines: [
        'Чистим стулья с мягкой обивкой и кресла дома и в офисе. Убираем пятна, пыль и запахи с обивки.',
      ],
      ctaLabel: 'Вызвать мастера',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-02.png',
      isPrimaryHeading: false,
      titleLines: ['Чистка стульев', 'и офисных кресел'],
      descriptionLines: [
        'Обрабатываем обивку стульев и компьютерных кресел; для комплектов действуют выгодные условия.',
      ],
      ctaLabel: 'Рассчитать по фото',
      ctaUrl: tg,
    },
    {
      backgroundImage: 'images/banner-slider-img/demo5-slide-01.png',
      isPrimaryHeading: false,
      titleLines: ['Тюмень и область', 'удобное время визита'],
      descriptionLines: [
        'Оставьте заявку — подскажем срок, ориентир по цене за стул и график выезда.',
      ],
      ctaLabel: 'Написать в MAX',
      ctaUrl: tg,
    },
  ],
  servicesSubtitle: 'Что делаем',
  servicesTitle: 'Химчистка стульев и кресел',
  fidTitle: 'стульев в среднем чистим за один выезд — в типовом случае',
  serviceCards: [
    {
      number: '01',
      category: 'Стулья',
      title: 'Чистка обивки стульев',
      description: 'Экстракция грязи с мягкой обивки, доступные пятна по согласованию.',
      imagePath: 'images/homepage-5/service/service-03.jpg',
      imageAlt: 'Химчистка стула с мягкой обивкой — иллюстрация услуги',
      detailUrl: tg,
    },
    {
      number: '02',
      category: 'Кресла',
      title: 'Чистка кресел',
      description: 'Финишный уход за ворсом кресел, нейтрализация запахов.',
      imagePath: 'images/homepage-5/service/service-02.jpg',
      imageAlt: 'Химчистка кресла',
      detailUrl: tg,
    },
    {
      number: '03',
      category: 'Офис',
      title: 'Офисные и компьютерные кресла',
      description: 'Чистим офисные стулья и компьютерные кресла на месте, без простоя.',
      imagePath: 'images/homepage-5/service/service-05.jpg',
      imageAlt: 'Химчистка офисного кресла',
      detailUrl: tg,
    },
    {
      number: '04',
      category: 'Пятна и запах',
      title: 'Пятновыведение обивки',
      description: 'Диагностика типа пятна, целевые средства, нейтрализация запахов.',
      imagePath: 'images/homepage-5/service/service-06.jpg',
      imageAlt: 'Удаление пятен с обивки стула',
      detailUrl: tg,
    },
  ],
  marquee: ['Химчистка стульев', 'Чистка кресел', 'Выезд мастера', 'Результат до/после'],
  aboutTitle: 'Почему заказывают химчистку стульев у нас.',
  aboutParagraphs: [
    'Чистим стулья с мягкой обивкой, обеденные и офисные кресла в Тюмени и области — дома и в офисе. Для комплектов из нескольких стульев предлагаем выгодную цену.',
    'Перед началом определяем тип обивки и согласуем риски; для семей с детьми и питомцами используем безопасную химию. Оплата — после результата.',
  ],
  offerSubtitle: 'Режим работы и заявки',
  offerTitleBeforeRotate: 'Делаем ваши стулья ',
  offerRotatingWords: ['свежими', 'чистыми', 'без пятен и запаха', 'готовыми к использованию'],
  offerBadge: 'за стул',
  pricingTitle: 'Стоимость химчистки стульев в Тюмени',
  pricingIntro:
    'Цена зависит от типа обивки, количества стульев и степени загрязнения. Ниже — ориентиры; точную стоимость фиксируем после фото или осмотра.',
  pricingAmount: '600',
  pricingFootnote:
    'Минимальная сумма заказа, условия выезда и тариф за город уточняйте при звонке или в мессенджере.',
  pricingPlans: [
    {
      name: 'Стул с мягкой обивкой',
      price: 'от 600',
      period: 'за шт.',
      lines: [
        { hasCheckIcon: true, text: 'Чистка обивки с экстракцией' },
        { hasCheckIcon: true, text: 'Доступные пятна в рамках заказа' },
        { hasCheckIcon: true, text: 'Сушка техникой мастера' },
        { hasCheckIcon: true, text: 'Сложные пятна и запахи — по согласованию' },
      ],
      ctaLabel: 'Заказать',
      ctaUrl: tg,
      featured: false,
    },
    {
      name: 'Комплект стульев',
      price: 'от 3 000',
      period: 'за 6 шт.',
      lines: [
        { hasCheckIcon: true, text: 'Выгодная цена за набор' },
        { hasCheckIcon: true, text: 'Диагностика и тест раствора' },
        { hasCheckIcon: true, text: 'Финиш и ворс' },
        { hasCheckIcon: true, text: 'Расчёт по фото в MAX' },
      ],
      ctaLabel: 'Рассчитать',
      ctaUrl: tg,
      featured: true,
    },
    {
      name: 'Офисное кресло',
      price: 'от 900',
      period: 'за шт.',
      lines: [
        { hasCheckIcon: true, text: 'Чистка компьютерных и офисных кресел' },
        { hasCheckIcon: true, text: 'Удаление запаха — отдельная услуга' },
        { hasCheckIcon: true, text: 'Работа на месте, без простоя' },
        { hasCheckIcon: true, text: 'Работа под ключ' },
      ],
      ctaLabel: 'Написать нам',
      ctaUrl: tg,
      featured: false,
    },
  ],
  ihboxTitles: ['Стулья', 'Обеденные', 'Офисные кресла', 'Компьютерные', 'Барные'],
  portfolio: [
    { categoryLabel: 'До/после', titleText: 'Обеденный стул', imageAlt: 'Стул с мягкой обивкой до и после чистки' },
    { categoryLabel: 'Пятна', titleText: 'Следы на сиденье', imageAlt: 'Удаление пятен с обивки стула' },
    { categoryLabel: 'Комплект', titleText: 'Набор из 6 стульев', imageAlt: 'Химчистка комплекта стульев' },
    { categoryLabel: 'Офис', titleText: 'Офисные кресла', imageAlt: 'Чистка офисных кресел' },
    { categoryLabel: 'Кресло', titleText: 'Компьютерное кресло', imageAlt: 'Химчистка компьютерного кресла' },
    { categoryLabel: 'Ткань', titleText: 'Тканевая обивка', imageAlt: 'Чистка тканевой обивки стула' },
    { categoryLabel: 'Бар', titleText: 'Барные стулья', imageAlt: 'Химчистка барных стульев' },
    { categoryLabel: 'Тюмень', titleText: 'Выезд по городу', imageAlt: 'Выездная химчистка стульев в Тюмени' },
  ],
  testimonialsTitle: 'Отзывы о химчистке стульев в Тюмени.',
  testimonialItems: [
    {
      quote:
        'Почистили комплект обеденных стульев — обивка стала как новая. За набор вышло выгодно.',
      authorName: 'Ирина',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о химчистке комплекта стульев',
    },
    {
      quote:
        'Убрали пятна с сидений на кухне. Мастер приехал вовремя, работал аккуратно и быстро.',
      authorName: 'Павел',
      authorDetail: 'Тюменская область',
      imageAlt: 'Отзыв о чистке стульев на дому',
    },
    {
      quote:
        'Отправил фото стульев в MAX, сразу назвали цену за штуку. Оплата после работы, как обещали.',
      authorName: 'Алексей',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв о заказе химчистки стульев',
    },
    {
      quote:
        'Чистили офисные кресла в тот же день, прямо на рабочих местах. Без простоя и лишней воды.',
      authorName: 'ИП «Логистик»',
      authorDetail: 'Тюмень',
      imageAlt: 'Отзыв B2B о химчистке офисных кресел',
    },
  ],
  staticBoxTitle: 'Как проходит химчистка стульев',
  staticBoxSteps: [
    {
      title: 'Осмотр обивки стульев',
      description:
        'Оцениваем комплект стульев и тип ткани сидений, тестируем состав на скрытом участке.',
      foregroundImageAlt: 'Этап 1 — осмотр обивки стула',
    },
    {
      title: 'Экстракция грязи',
      description:
        'Влажная чистка сидений и спинок с извлечением грязи из ткани каждого стула.',
      foregroundImageAlt: 'Этап 2 — экстракция грязи из стула',
    },
    {
      title: 'Пятна на сиденьях',
      description:
        'Выводим пятна от еды и напитков на сиденьях подбором подходящего пятновыводителя.',
      foregroundImageAlt: 'Этап 3 — пятновыведение на стуле',
    },
    {
      title: 'Нейтрализация и сушка',
      description:
        'Снимаем остатки растворов и сушим стулья, чтобы комплектом можно было пользоваться быстрее.',
      foregroundImageAlt: 'Этап 4 — сушка стульев',
    },
  ],
  faqTitle: 'Вопросы о химчистке стульев',
  faqIntro:
    'Коротко о цене за стул, сушке и работе с комплектами. Если не найдёте ответ — свяжитесь с нами.',
  faqLeft: [
    {
      question: 'Сколько стоит химчистка стула?',
      answer:
        'Считаем за штуку, для комплектов действует выгодная цена; ориентиры — в блоке с ценами выше. Итог фиксируем после фото или осмотра.',
    },
    {
      question: 'Чистите офисные и компьютерные кресла?',
      answer:
        'Да, обрабатываем офисные стулья и компьютерные кресла на месте, без вывоза и простоя.',
    },
    {
      question: 'Сколько сохнет обивка стула?',
      answer: 'Обычно несколько часов; сушим техникой мастера, рекомендуем не нагружать сиденье до высыхания.',
    },
    {
      question: 'Есть скидка на комплект?',
      answer: 'Да, при чистке набора стульев цена за штуку ниже. Точную сумму назовём по фото.',
    },
  ],
  faqRight: [
    {
      question: 'Что входит в химчистку стула?',
      answer:
        'Механическая подготовка, влажная чистка обивки, работа с доступными пятнами, антисептическая обработка по протоколу.',
    },
    {
      question: 'Выезжаете в офис?',
      answer: 'Да, чистим стулья и кресла в офисах, по договорённости — в тот же день.',
    },
    {
      question: 'Будет ли стул «как новый»?',
      answer:
        'Чистка заметно улучшает вид и гигиену, но не восстанавливает изношенную или выцветшую обивку.',
    },
    {
      question: 'Выезжаете за город?',
      answer: 'Да, по Тюмени и области. Тариф за выезд уточняйте в заявке.',
    },
  ],
});

// Реестр кластеров по slug (соответствует папкам в src/pages).
export const clusters = {
  'khimchistka-divanov': divanov,
  'khimchistka-kovrov': kovrov,
  'khimchistka-matrasov': matrasov,
  'khimchistka-myagkoy-mebeli': myagkoyMebeli,
  'khimchistka-stulev': stulev,
} as const;

export type ClusterSlug = keyof typeof clusters;
