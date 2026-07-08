<?php

declare(strict_types=1);

namespace App\Application\Contact\Queries;

use App\Application\Contact\Dto\ContactIhboxCardDto;
use App\Application\Contact\Dto\ContactPageDto;
use App\Application\Home\Dto\ClientLogoDto;
use App\Application\Home\Dto\FooterDto;
use App\Application\Home\Dto\HomeHeaderDto;
use App\Application\Home\Dto\NavLinkDto;

final class GetContactPageQuery
{
    public function execute(): ContactPageDto
    {
        $brand = (string) config('site.brand');
        $phoneDisplay = (string) config('site.phone');
        $phoneTel = (string) config('site.phone_tel');
        $phoneTelHref = 'tel:'.$phoneTel;
        $telegramUrl = (string) config('site.telegram_url');
        $homeUrl = route('home');
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

        $ihboxCards = [
            new ContactIhboxCardDto(
                'pbmit-xinterio-icon pbmit-xinterio-icon-living-room',
                'Выезд по Тюмени',
                'Подбираем окно визита и согласуем доступ к воде и электричеству.',
                $uslugiUrl,
            ),
            new ContactIhboxCardDto(
                'pbmit-xinterio-icon pbmit-xinterio-icon-house',
                'Химчистка на дому',
                'Диваны, угловые, матрасы и кресла — в одном выезде по протоколу.',
                $telegramUrl,
            ),
            new ContactIhboxCardDto(
                'pbmit-xinterio-icon pbmit-xinterio-icon-3d',
                'Оценка по фото',
                'Снимите обивку при дневном свете — озвучим ориентир до визита.',
                $telegramUrl,
            ),
            new ContactIhboxCardDto(
                'pbmit-xinterio-icon pbmit-xinterio-icon-brickwall-1',
                'Безопасная схема',
                'Тест раствора в скрытой зоне и предсказуемый уход за ворсом.',
                $homeUrl.'#faq',
            ),
            new ContactIhboxCardDto(
                'pbmit-xinterio-icon pbmit-xinterio-icon-hard-hat',
                'Сушка техникой мастера',
                'Промышленный осушитель ускоряет готовность мебели к эксплуатации.',
                $homeUrl.'#pricing',
            ),
        ];

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

        return new ContactPageDto(
            header: $header,
            headerPhoneDisplay: $phoneDisplay,
            headerPhoneTelHref: $phoneTelHref,
            titleBarHeading: 'Контакты',
            breadcrumbHomeLabel: $brand,
            breadcrumbHomeUrl: $homeUrl,
            breadcrumbCurrentLabel: 'Контакты',
            ihboxCards: $ihboxCards,
            contactSubtitle: 'Связь с нами',
            contactTitle: 'Ответим на вопросы и примем заявку',
            contactIntro: 'Оставьте сообщение — перезвоним или ответим в мессенджере. Удобно также написать в MAX и приложить фото дивана: так быстрее понять объём работ и озвучить ориентир по цене. Работаем по Тюмени и области; оплата после выполнения.',
            formHeading: 'Написать нам',
            clientLogos: $clientLogos,
            mapEmbedUrl: (string) config('site.maps_embed_url'),
            mapIframeTitle: 'Карта: Тюмень — зона выезда Пора Чистить',
            footer: $footer,
        );
    }
}
