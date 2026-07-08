@props([
    'accordionId' => 'faq-accordion',
    'items' => [],
])

<div class="accordion" id="{{ $accordionId }}">
    @foreach ($items as $item)
        <div class="accordion-item {{ $loop->first ? 'active' : '' }}">
            <h2 class="accordion-header" id="{{ $accordionId }}-head-{{ $loop->iteration }}">
                <button
                    class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#{{ $accordionId }}-collapse-{{ $loop->iteration }}"
                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                    aria-controls="{{ $accordionId }}-collapse-{{ $loop->iteration }}"
                >
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed" aria-hidden="true">
                            <svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                            </svg>
                        </span>
                        <span class="pbmit-accordion-icon-opened" aria-hidden="true">
                            <svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                            </svg>
                        </span>
                    </span>
                    <span class="pbmit-accordion-title">{{ $item->question }}</span>
                </button>
            </h2>
            <div
                id="{{ $accordionId }}-collapse-{{ $loop->iteration }}"
                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                aria-labelledby="{{ $accordionId }}-head-{{ $loop->iteration }}"
                data-bs-parent="#{{ $accordionId }}"
            >
                <div class="accordion-body">
                    {{ $item->answer }}
                </div>
            </div>
        </div>
    @endforeach
</div>
