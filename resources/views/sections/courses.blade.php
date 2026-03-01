<section class="s-courses" aria-labelledby="courses-title">
    <div class="container">

        <div class="s-courses__header">
            <h2 id="courses-title">Nuestros Cursos</h2>
            <p class="s-courses__subtitle">Explora nuestra oferta formativa</p>
        </div>

        @include('sections.category-filter', ['categories' => $categories])

        <div class="s-courses__grid" role="list" id="courses-grid">
            @foreach($courses as $course)
                <div
                    class="s-courses__item"
                    data-category="{{ $course['category_slug'] }}"
                >
                    @include('components.course-card', [
                        'course'         => $course,
                        'modalityColors' => $modalityColors,
                    ])
                </div>
            @endforeach
        </div>

        <p class="s-courses__empty" id="no-courses" style="display:none">
            No hay cursos en esta categoría.
        </p>

    </div>
</section>
