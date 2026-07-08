@props(['data' => null])

<section class="section-xl" id="{{ $data->anchorId }}">
    <div class="container">
        <div class="pbmit-heading-subheading text-center animation-style2">
            <h4 class="pbmit-subtitle">{{ $data->subtitle }}</h4>
            <h2 class="pbmit-title">{{ $data->title }}</h2>
            <div class="pbmit-heading-desc">
                {{ $data->intro }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="pe-xl-3">
                    <x-landing.faq-accordion :accordion-id="$data->leftAccordionId" :items="$data->leftColumn" />
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="ps-xl-3">
                    <x-landing.faq-accordion :accordion-id="$data->rightAccordionId" :items="$data->rightColumn" />
                </div>
            </div>
        </div>
    </div>
</section>
