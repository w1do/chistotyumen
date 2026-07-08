// Статический контент страницы «Контакты» (миграция из Laravel GetContactPageQuery).
// Пути к изображениям указаны относительно /public (обслуживаются из корня сайта).

import { site, clientLogos, footer, header as siteHeader, type NavLink, type ClientLogo } from './home';

// Список услуг (кластерных страниц) для выпадающего списка в форме контактов.
// Берём из пункта меню «Услуги» основного хедера, чтобы не дублировать данные.
export interface ServiceOption {
  label: string;
  url: string;
}

const serviceOptions: ServiceOption[] =
  siteHeader.navItems
    .find((item) => item.label === 'Услуги')
    ?.children?.map((child) => ({ label: child.label, url: child.url })) ?? [];

const homeUrl = '/';
const uslugiUrl = '/uslugi';
const contactUrl = '/contact';
const tg = site.telegramUrl;

export interface ContactHeader {
  logoPath: string;
  logoAlt: string;
  homeUrl: string;
  navItems: NavLink[];
  primaryCtaLabel: string;
  primaryCtaUrl: string;
}

const header: ContactHeader = {
  logoPath: 'images/logo.png',
  logoAlt: site.brand,
  homeUrl,
  navItems: [
    { label: 'Главная', url: homeUrl },
    { label: 'Услуги', url: '/uslugi', children: serviceOptions },
    { label: 'Блог', url: '/posts' },
    { label: 'Контакты', url: contactUrl },
  ],
  primaryCtaLabel: 'Вызвать мастера',
  primaryCtaUrl: tg,
};

export interface ContactIhboxCard {
  iconClass: string;
  title: string;
  description: string;
  readMoreUrl: string;
  readMoreLabel: string;
}

const ihboxCards: ContactIhboxCard[] = [
  {
    iconClass: 'pbmit-xinterio-icon pbmit-xinterio-icon-living-room',
    title: 'Выезд по Тюмени',
    description: 'Подбираем окно визита и согласуем доступ к воде и электричеству.',
    readMoreUrl: uslugiUrl,
    readMoreLabel: 'Подробнее',
  },
  {
    iconClass: 'pbmit-xinterio-icon pbmit-xinterio-icon-house',
    title: 'Химчистка на дому',
    description: 'Диваны, угловые, матрасы и кресла — в одном выезде по протоколу.',
    readMoreUrl: tg,
    readMoreLabel: 'Подробнее',
  },
  {
    iconClass: 'pbmit-xinterio-icon pbmit-xinterio-icon-3d',
    title: 'Оценка по фото',
    description: 'Снимите обивку при дневном свете — озвучим ориентир до визита.',
    readMoreUrl: tg,
    readMoreLabel: 'Подробнее',
  },
  {
    iconClass: 'pbmit-xinterio-icon pbmit-xinterio-icon-brickwall-1',
    title: 'Безопасная схема',
    description: 'Тест раствора в скрытой зоне и предсказуемый уход за ворсом.',
    readMoreUrl: `${homeUrl}#faq`,
    readMoreLabel: 'Подробнее',
  },
  {
    iconClass: 'pbmit-xinterio-icon pbmit-xinterio-icon-hard-hat',
    title: 'Сушка техникой мастера',
    description: 'Промышленный осушитель ускоряет готовность мебели к эксплуатации.',
    readMoreUrl: `${homeUrl}#pricing`,
    readMoreLabel: 'Подробнее',
  },
];

export interface ContactPage {
  meta: {
    title: string;
    description: string;
  };
  jsonLd: unknown[];
  header: ContactHeader;
  headerPhoneDisplay: string;
  headerPhoneTelHref: string;
  titleBarHeading: string;
  breadcrumbHomeLabel: string;
  breadcrumbHomeUrl: string;
  breadcrumbCurrentLabel: string;
  ihboxCards: ContactIhboxCard[];
  contactSubtitle: string;
  contactTitle: string;
  contactIntro: string;
  formHeading: string;
  serviceOptions: ServiceOption[];
  clientLogos: ClientLogo[];
  mapEmbedUrl: string;
  mapIframeTitle: string;
  footer: typeof footer;
}

const title =
  'Контакты Чисто Тюмень — химчистка дивана с выездом в Тюмени';
const description =
  'Связь с Чисто Тюмень: телефон, MAX и форма заявки. Закажите выезд мастера по химчистке дивана и мягкой мебели в Тюмени и области.';
const pageUrl = `${site.siteUrl}${contactUrl}`;

export const contact: ContactPage = {
  meta: { title, description },
  jsonLd: [
    {
      '@context': 'https://schema.org',
      '@type': 'ContactPage',
      name: title,
      description,
      url: pageUrl,
      inLanguage: 'ru-RU',
      isPartOf: {
        '@type': 'WebSite',
        url: site.siteUrl,
        name: site.brand,
      },
    },
    {
      '@context': 'https://schema.org',
      '@type': 'Organization',
      name: site.brand,
      url: site.siteUrl,
      telephone: site.phoneTel,
    },
  ],
  header,
  headerPhoneDisplay: site.phone,
  headerPhoneTelHref: `tel:${site.phoneTel}`,
  titleBarHeading: 'Контакты',
  breadcrumbHomeLabel: site.brand,
  breadcrumbHomeUrl: homeUrl,
  breadcrumbCurrentLabel: 'Контакты',
  ihboxCards,
  contactSubtitle: 'Связь с нами',
  contactTitle: 'Ответим на вопросы и примем заявку',
  contactIntro:
    'Оставьте сообщение — перезвоним или ответим в мессенджере. Удобно также написать в MAX и приложить фото дивана: так быстрее понять объём работ и озвучить ориентир по цене. Работаем по Тюмени и области; оплата после выполнения.',
  formHeading: 'Написать нам',
  serviceOptions,
  clientLogos,
  mapEmbedUrl:
    'https://maps.google.com/maps?q=%D0%A2%D1%8E%D0%BC%D0%B5%D0%BD%D1%8C&t=m&z=11&output=embed&iwloc=near',
  mapIframeTitle: 'Карта: Тюмень — зона выезда Пора Чистить',
  footer,
};
