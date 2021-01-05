<?php declare(strict_types = 1);

namespace PatrickLouys\Template;

interface Renderer
{
    public function render($template, $data = []) : string;
}