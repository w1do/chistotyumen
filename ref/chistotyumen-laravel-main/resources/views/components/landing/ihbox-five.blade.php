@props(['items' => []])

<section class="section-lg ihbox-five">
    <div class="container">
        <div class="row g-0">
            @foreach ($items as $item)
                <div class="pbmit-col-20">
                    <div class="pbmit-ihbox-style-10">
                        <div class="pbmit-ihbox-headingicon">
                            <div class="pbmit-ihbox-icon">
                                <div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
                                    <img src="{{ asset($item->imagePath) }}" alt="{{ $item->imageAlt }}">
                                </div>
                            </div>
                            <div class="pbmit-ihbox-contents">
                                <h2 class="pbmit-element-title">{{ $item->title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
