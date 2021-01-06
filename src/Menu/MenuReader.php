<?php declare(strict_types=1);

namespace PatrickLouys\Menu;

interface MenuReader
{
    public function readMenu() : array;
}