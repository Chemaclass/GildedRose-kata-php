<?php

declare(strict_types=1);

namespace GildedRose\ItemQualityUpdater;

use GildedRose\Item;

interface ItemQualityUpdaterInterface
{
    public function update(Item $item): Item;
}
