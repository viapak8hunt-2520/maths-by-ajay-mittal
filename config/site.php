<?php

return [
    'name' => 'Mathematics by Ajay Mittal',
    'tagline' => 'Concept-based mathematics coaching for school, senior secondary and competitive exams.',
    'url' => env('APP_URL', 'http://localhost:8080'),

    'contact' => [
        'phone' => env('SITE_PHONE', '+91-00000-00000'),
        'phone_display' => env('SITE_PHONE_DISPLAY', '+91 00000 00000'),
        'email' => env('SITE_EMAIL', 'contact@example.com'),
        'whatsapp' => env('SITE_WHATSAPP', '910000000000'),
        'whatsapp_message' => 'Hello, I would like to enquire about mathematics coaching.',
        'address' => [
            'line1' => '[Coaching centre address — update in config/site.php or .env]',
            'city' => '[City]',
            'state' => '[State]',
            'pin' => '[PIN]',
            'map_embed_url' => null,
        ],
    ],

    'social' => [
        'facebook' => env('SITE_FACEBOOK', ''),
        'instagram' => env('SITE_INSTAGRAM', ''),
        'youtube' => env('SITE_YOUTUBE', ''),
    ],

    'brand' => [
        'primary' => '#0f172a',
        'accent' => '#be123c',
        'gold' => '#b8860b',
    ],

    'enquiry' => [
        'handler' => env('ENQUIRY_HANDLER', 'file'),
        'mail_to' => env('ENQUIRY_MAIL_TO', env('SITE_EMAIL', 'contact@example.com')),
        'rate_limit' => '6,1',
    ],

    'navigation' => [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'Courses', 'route' => 'courses.index'],
        ['label' => 'Study Resources', 'route' => 'resources.index'],
        ['label' => 'Results', 'route' => 'results'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Contact', 'route' => 'contact'],
    ],

    'footer' => [
        'copyright' => '© :year Mathematics by Ajay Mittal. All rights reserved.',
        'privacy_route' => null,
    ],
];
