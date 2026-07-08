<?php

declare(strict_types=1);

namespace App\Application\Services\Queries;

use App\Application\Home\Dto\FaqItemDto;
use App\Application\Home\Dto\FooterDto;
use App\Application\Home\Dto\HomeHeaderDto;
use App\Application\Home\Dto\NavLinkDto;
use App\Application\Services\Dto\ServiceDetailStatDto;
use App\Application\Services\Dto\ServicesPageDto;

final class GetServicesPageQuery
{
    public function execute(): ServicesPageDto
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

        $bulletLeft = [
            'Мастера с опытом работы с бытовой и коммерческой обивкой',
            'Предсказуемая схема: осмотр, тест раствора, основной цикл, сушка',
            'Фиксируем объём до выезда: по фото и короткому описанию',
            'Работаем с синтетикой, миксами, частью натуральных тканей и кожзамом',
        ];

        $bulletRight = [
            'Промышленный экстрактор и осушитель — без «мокрого» интерьера на сутки',
            'Пятновыведение там, где это уместно по типу загрязнения',
            'Матрасы и кресла можно включить в один выезд',
            'Оплата после выполнения; уточняем график по Тюмени и области',
        ];

        $faqItems = [
            new FaqItemDto(
                'Чем профессиональная химчистка отличается от бытовых средств?',
                'Промышленный экстрактор лучше отмывает и забирает влагу вместе с растворёнными загрязнениями; средства подбираются по типу ткани после теста в скрытой зоне.',
            ),
            new FaqItemDto(
                'Как формируется цена?',
                'От габаритов, типа обивки, степени загрязнения и состава выезда (только диван или диван + матрас). Ориентир озвучим по фото и уточним на месте.',
            ),
            new FaqItemDto(
                'Сколько сохнет мебель?',
                'Зависит от ткани и вентиляции; осушитель сокращает время. Обычно готовность к аккуратному использованию — в тот же вечер или на следующий день.',
            ),
            new FaqItemDto(
                'Можно ли убрать старые пятна?',
                'Иногда — частично или полностью; зависит от возраста, реагентов, которые уже пробовали, и структуры ворса. Честно скажем, если шанс низкий.',
            ),
        ];

        return new ServicesPageDto(
            header: $header,
            titleBarHeading: 'Химчистка мягкой мебели',
            headerPhoneDisplay: $phoneDisplay,
            headerPhoneTelHref: $phoneTelHref,
            breadcrumbHomeLabel: $brand,
            breadcrumbHomeUrl: $homeUrl,
            breadcrumbTrail: [
                new NavLinkDto('Услуги', $uslugiUrl),
            ],
            breadcrumbCurrentLabel: 'Химчистка мягкой мебели',
            featureImagePath: 'images/homepage-5/service/service-01.jpg',
            featureImageAlt: 'Выезд мастера Пора Чистить — химчистка дивана в Тюмени',
            contentTitle: 'Задача — бережно очистить обивку и вернуть комфорт без лишнего стресса',
            leadParagraph: 'Учитывая быт, аллергены и нагрузку на обивку, выездная химчистка строится вокруг вашего интерьера: доступ к розетке и воде, бережное обращение с напольным покрытием и корректная сушка. Мы работаем по понятному протоколу — от теста раствора до финишного вакуумирования ворса — и заранее согласуем окно визита.',
            bulletColumnLeft: $bulletLeft,
            bulletColumnRight: $bulletRight,
            galleryLeftPath: 'images/homepage-5/service/service-02.jpg',
            galleryLeftAlt: 'Этап чистки обивки дивана — работа мастера',
            galleryRightPath: 'images/homepage-5/service/service-03.jpg',
            galleryRightAlt: 'Результат химчистки мягкой мебели — пример',
            bodyParagraph: 'В процессе мы опираемся на тип ткани и условия сушки: для синтетики и миксов чаще допустим более активный цикл, для деликатных материалов — щадящий режим и контроль влаги. Это снижает риск водяных разводов, деформации наполнителя и долгой эксплуатации «сырой» мебелью. Отдельно обсуждаем пятна и то, что уже пытались вывести дома — это влияет на стратегию.',
            stats: [
                new ServiceDetailStatDto(92, 'Извлечение раствора', 'Экстрактор помогает забрать загрязнения вместе с влажной фазой'),
                new ServiceDetailStatDto(88, 'Согласование до выезда', 'Ориентир по цене и времени до приезда мастера'),
                new ServiceDetailStatDto(95, 'Выезд по Тюмени', 'Работаем по городу и можем согласовать область'),
            ],
            faqSectionTitle: 'Частые вопросы',
            faqIntro: 'Коротко о том, как проходит выезд, из чего складывается стоимость и чего стоит ожидать по срокам сушки. Если не нашли ответ — напишите в MAX или оставьте заявку на странице контактов.',
            faqItems: $faqItems,
            sidebarServicesTitle: 'Услуги',
            sidebarServiceLinks: [
                new NavLinkDto('Химчистка диванов', $uslugiUrl),
                new NavLinkDto('Угловые и модульные секции', $uslugiUrl),
                new NavLinkDto('Кресла и пуфы', $uslugiUrl),
                new NavLinkDto('Матрасы', $uslugiUrl),
                new NavLinkDto('Коммерческая мебель', $uslugiUrl),
                new NavLinkDto('Консультация по сложным пятнам', $contactUrl),
            ],
            sidebarCtaSubheading: 'Связь с мастером',
            sidebarCtaSubtitle: 'Готовы обсудить выезд?',
            sidebarCtaTitle: 'Напишите или позвоните',
            sidebarCtaPhoneDisplay: $phoneDisplay,
            sidebarCtaButtonLabel: 'Написать в MAX',
            sidebarCtaButtonUrl: $telegramUrl,
            sidebarDownloadsTitle: 'Материалы',
            downloadLinks: [
                new NavLinkDto('Памятка клиента перед визитом (PDF)', '#'),
                new NavLinkDto('Чек-лист подготовки помещения (PDF)', '#'),
            ],
            footer: $footer,
        );
    }
}
