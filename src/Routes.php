<?php declare(strict_types = 1);

return [
    ['GET', '/', ['PatrickLouys\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['PatrickLouys\Controllers\Page', 'show']],
];