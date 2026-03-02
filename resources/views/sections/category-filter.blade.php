<div class="s-courses__filters" role="group" aria-label="Filtrar por categoría">

    <button class="c-filter-pill c-filter-pill--active" data-category="all" aria-pressed="true">
        Todos
    </button>

    @foreach($categories as $category)
        <button
            class="c-filter-pill"
            data-category="{{ $category['slug'] }}"
            aria-pressed="false"
        >
            {{ $category['label'] }}
        </button>
    @endforeach

</div>
