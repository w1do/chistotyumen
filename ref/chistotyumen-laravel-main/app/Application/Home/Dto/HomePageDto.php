<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class HomePageDto
{
    /**
     * @param  list<HeroSlideDto>  $heroSlides
     * @param  list<MarqueeItemDto>  $marquee
     * @param  list<IhboxItemDto>  $ihboxItems
     * @param  list<PortfolioSlideDto>  $portfolioSlides
     * @param  list<ClientLogoDto>  $clientLogos
     */
    public function __construct(
        public HomeHeaderDto $header,
        public array $heroSlides,
        public ServiceSectionDto $services,
        public array $marquee,
        public AboutFiveSectionDto $about,
        public array $ihboxItems,
        public array $portfolioSlides,
        public StaticBoxesSectionDto $staticBoxes,
        public AboutOfferSectionDto $aboutOffer,
        public PricingSectionDto $pricing,
        public FaqSectionDto $faq,
        public TestimonialSectionDto $testimonials,
        public array $clientLogos,
        public BlogSectionDto $blog,
        public FooterDto $footer,
    ) {}
}
