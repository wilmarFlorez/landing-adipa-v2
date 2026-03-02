<?php

namespace App\Data;

class CoursesData
{
    public static function getCategories(): array
    {
        return [
            [
                'id'    => 1,
                'label' => 'Psicología Clínica',
                'slug'  => 'psicologia-clinica',
            ],
            [
                'id'    => 2,
                'label' => 'Psicología Organizacional',
                'slug'  => 'psicologia-organizacional',
            ],
            [
                'id'    => 3,
                'label' => 'Neurociencias',
                'slug'  => 'neurociencias',
            ],
            [
                'id'    => 4,
                'label' => 'Salud Mental',
                'slug'  => 'salud-mental',
            ],
        ];
    }

    /**
     * Badge background colors keyed by modality label.
     * Values mirror the brand design tokens so the controller stays color-agnostic.
     *
     * @return array<string, string>
     */
    public static function getModalityColors(): array
    {
        return [
            'Online'     => '#2CB7FF',   // $color-secondary
            'En Vivo'    => '#704EFD',   // $color-primary
            'Presencial' => '#FFA927',   // $color-orange
        ];
    }

    public static function getCourses(): array
    {
        return [
            [
                'id'             => 1,
                'title'          => 'Terapia Cognitivo-Conductual para Trastornos de Ansiedad',
                'instructor'     => 'Dra. Valentina Rojas',
                'category_slug'  => 'psicologia-clinica',
                'start_date'     => '2026-04-07',
                'price'          => 180000,
                'discount_price' => 129000,
                'modality'       => 'Online',
                'image_url'      => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&h=400&fit=crop',
                'description'    => 'Aprende a aplicar protocolos TCC basados en evidencia para el tratamiento de ansiedad.',
            ],
            [
                'id'             => 2,
                'title'          => 'Primeros Auxilios Psicológicos e Intervención en Crisis',
                'instructor'     => 'Dr. Sebastián Mora',
                'category_slug'  => 'psicologia-clinica',
                'start_date'     => '2026-05-12',
                'price'          => 150000,
                'discount_price' => 99000,
                'modality'       => 'En Vivo',
                'image_url'      => 'https://images.unsplash.com/photo-1527689368864-3a821dbccc34?w=600&h=400&fit=crop',
                'description'    => 'Estrategias de intervención inmediata para situaciones de crisis y emergencia psicológica.',
            ],
            [
                'id'             => 3,
                'title'          => 'Psicoterapia Breve Orientada a Soluciones',
                'instructor'     => 'Mg. Carolina Fuentes',
                'category_slug'  => 'psicologia-clinica',
                'start_date'     => '2026-06-02',
                'price'          => 160000,
                'discount_price' => 115000,
                'modality'       => 'Online',
                'image_url'      => 'https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=600&h=400&fit=crop',
                'description'    => 'Modelo terapéutico centrado en recursos del consultante para generar cambios rápidos.',
            ],
            [
                'id'             => 4,
                'title'          => 'Liderazgo Transformacional y Bienestar Organizacional',
                'instructor'     => 'Dr. Andrés Castillo',
                'category_slug'  => 'psicologia-organizacional',
                'start_date'     => '2026-04-20',
                'price'          => 200000,
                'discount_price' => 149000,
                'modality'       => 'En Vivo',
                'image_url'      => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&h=400&fit=crop',
                'description'    => 'Desarrolla habilidades de liderazgo que promuevan el bienestar y la motivación en equipos.',
            ],
            [
                'id'             => 5,
                'title'          => 'Gestión del Talento y Diagnóstico de Clima Laboral',
                'instructor'     => 'Mg. Daniela Herrera',
                'category_slug'  => 'psicologia-organizacional',
                'start_date'     => '2026-07-14',
                'price'          => 175000,
                'discount_price' => 129000,
                'modality'       => 'Online',
                'image_url'      => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&h=400&fit=crop',
                'description'    => 'Herramientas para medir clima organizacional y diseñar estrategias de retención del talento.',
            ],
            [
                'id'             => 6,
                'title'          => 'Neuropsicología Clínica: Evaluación y Diagnóstico',
                'instructor'     => 'Dr. Felipe Soto',
                'category_slug'  => 'neurociencias',
                'start_date'     => '2026-05-25',
                'price'          => 220000,
                'discount_price' => 169000,
                'modality'       => 'Presencial',
                'image_url'      => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=600&h=400&fit=crop',
                'description'    => 'Domina los principales instrumentos de evaluación neuropsicológica para uso clínico.',
            ],
            [
                'id'             => 7,
                'title'          => 'Neurociencia del Aprendizaje y Plasticidad Cerebral',
                'instructor'     => 'Dra. Isabel Vega',
                'category_slug'  => 'neurociencias',
                'start_date'     => '2026-08-10',
                'price'          => 195000,
                'discount_price' => 145000,
                'modality'       => 'Online',
                'image_url'      => 'https://images.unsplash.com/photo-1507413245164-6160d8298b31?w=600&h=400&fit=crop',
                'description'    => 'Explora los mecanismos cerebrales del aprendizaje y cómo aprovecharlos en contextos clínicos.',
            ],
            [
                'id'             => 8,
                'title'          => 'Mindfulness Basado en la Evidencia para Reducción del Estrés',
                'instructor'     => 'Mg. Paola Mendoza',
                'category_slug'  => 'salud-mental',
                'start_date'     => '2026-04-13',
                'price'          => 140000,
                'discount_price' => 95000,
                'modality'       => 'En Vivo',
                'image_url'      => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=600&h=400&fit=crop',
                'description'    => 'Protocolo MBSR adaptado para profesionales de salud mental con fundamento neurocientífico.',
            ],
            [
                'id'             => 9,
                'title'          => 'Intervención Temprana en Salud Mental Infantil y Adolescente',
                'instructor'     => 'Dra. Francisca Lagos',
                'category_slug'  => 'salud-mental',
                'start_date'     => '2026-09-07',
                'price'          => 165000,
                'discount_price' => 119000,
                'modality'       => 'Online',
                'image_url'      => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=600&h=400&fit=crop',
                'description'    => 'Detección y abordaje temprano de señales de alerta en salud mental en niños y adolescentes.',
            ],
        ];
    }
}
