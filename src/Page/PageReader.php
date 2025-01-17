<?php declare(strict_types = 1);

namespace PatrickLouys\Page;

interface PageReader
{
    public function readBySlug(string $slug) : string;
}