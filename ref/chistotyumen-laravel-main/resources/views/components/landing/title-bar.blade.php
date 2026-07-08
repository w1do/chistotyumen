@props([
    'heading' => '',
    'homeLabel' => '',
    'homeUrl' => '#',
    'currentLabel' => '',
    /** @var list<object{label: string, url: string}> $trailItems */
    'trailItems' => [],
])

<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title">{{ $heading }}</h1>
                    </div>
                </div>
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="{{ $homeLabel }}" href="{{ $homeUrl }}" class="home"><span>{{ $homeLabel }}</span></a>
                        </span>
                        <span class="sep" aria-hidden="true">
                            <i class="pbmit-base-icon-angle-right"></i>
                        </span>
                        @foreach ($trailItems as $trail)
                            <span>
                                <a title="{{ $trail->label }}" href="{{ $trail->url }}" class="home"><span>{{ $trail->label }}</span></a>
                            </span>
                            <span class="sep" aria-hidden="true">
                                <i class="pbmit-base-icon-angle-right"></i>
                            </span>
                        @endforeach
                        <span><span class="post-root post post-post current-item">{{ $currentLabel }}</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
