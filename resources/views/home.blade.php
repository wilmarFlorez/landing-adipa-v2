@extends('layouts.app')

@section('title', 'ADIPA | Catálogo de Cursos')
@section('description', 'Explora nuestro catálogo de cursos y diplomados en psicología y salud mental. Formación online, en vivo y presencial para profesionales.')
@section('keywords', 'cursos psicología online, diplomados salud mental, formación profesional, psicología clínica, ADIPA')
@section('canonical', url('/'))

@section('og_title',       'ADIPA | Catálogo de Cursos de Psicología y Salud Mental')
@section('og_description', 'Explora nuestro catálogo de cursos y diplomados en psicología y salud mental. Formación online, en vivo y presencial.')
@section('og_url', url('/'))

@section('twitter_title',       'ADIPA | Catálogo de Cursos de Psicología y Salud Mental')
@section('twitter_description', 'Explora nuestro catálogo de cursos y diplomados en psicología y salud mental. Formación online, en vivo y presencial.')

@section('content')
    @include('sections.hero')

    @include('sections.courses', [
        'courses'        => $courses,
        'categories'     => $categories,
        'modalityColors' => $modalityColors,
    ])

    @include('sections.contact')
@endsection
