@props([
    'embedUrl' => '',
    'title' => 'Карта',
])

<section class="section-xl">
    <div class="container-fluid">
        <div class="iframe-area">
            <iframe src="{{ $embedUrl }}" title="{{ $title }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
