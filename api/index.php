<?php

// Paksa SCRIPT_NAME ke /index.php agar prefix /api/ pada URL tidak terpotong oleh Symfony/Laravel Request
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

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

$_ENV['APP_STORAGE'] = '/tmp';
putenv('APP_STORAGE=/tmp');

require __DIR__ . '/../public/index.php';