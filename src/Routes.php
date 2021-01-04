<?php declare(strict_types = 1);

return [
    ['get', '/hello-world', function() {
        echo 'Hello World!';
    }],
    ['get', '/another-route', function() {
        echo 'This works too';
    }],
];