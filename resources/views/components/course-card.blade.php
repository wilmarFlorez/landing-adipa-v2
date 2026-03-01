@props([
    'course'     => [],
    'badgeColor' => '',
])

<article class="c-card" role="listitem">

    <div class="c-card__image-wrapper">
        <img
            class="c-card__image"
            src="{{ $course['image_url'] }}"
            alt="Imagen del curso {{ $course['title'] }}"
            loading="lazy"
        />
        <span
            class="c-card__badge"
            style="background-color: {{ $badgeColor }}"
        >
            {{ $course['modality'] }}
        </span>
    </div>

    <div class="c-card__body">

        <h3 class="c-card__title">{{ $course['title'] }}</h3>

        <p class="c-card__instructor">
            {{-- Person icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
            {{ $course['instructor'] }}
        </p>

        <p class="c-card__date">
            {{-- Calendar icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            {{ formatDate($course['start_date']) }}
        </p>

        <div class="c-card__pricing">
            <span class="c-card__price-original">{{ formatPrice($course['price']) }}</span>
            <span class="c-card__price-discount">{{ formatPrice($course['discount_price']) }}</span>
        </div>

        <x-button variant="primary" size="sm" text="Ver curso" class="c-card__cta" />

    </div>

</article>
