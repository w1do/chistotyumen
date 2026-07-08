@props(['logos' => []])

<section class="section-md overflow-hidden">
    <div class="container">
        <div class="row g-4">
            @foreach ($logos as $logo)
                <article class="pbmit-client-style-1 pbmit-col-20">
                    <div class="pbmit-border-wrapper">
                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                            <h4 class="pbmit-hide">{{ $logo->visuallyHiddenTitle }}</h4>
                            <div class="pbmit-client-hover-img">
                                <img src="{{ asset($logo->hoverImagePath) }}" class="w-100" alt="{{ $logo->alt }}">
                            </div>
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{ asset($logo->greyImagePath) }}" class="w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
