@extends('layouts.app')

@section('title', 'ADIPA | Catálogo de Cursos')

@section('content')
    @include('sections.hero')

    @include('sections.courses', [
        'courses'        => $courses,
        'categories'     => $categories,
        'modalityColors' => $modalityColors,
    ])

    @include('sections.contact')
@endsection
