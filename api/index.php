<?php

// Buat struktur folder sementara di /tmp yang diizinkan ditulis oleh Vercel
$dirs = [
    '/tmp/views',
    '/tmp/cache/data',
    '/tmp/sessions',
    '/tmp/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Alihkan path storage Laravel ke /tmp
$_ENV['APP_STORAGE'] = '/tmp';
putenv('APP_STORAGE=/tmp');

require __DIR__ . '/../public/index.php';