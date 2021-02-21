<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\ItemQualityUpdater\AgedBrieItemQualityUpdater;
use GildedRose\ItemQualityUpdater\BackstageItemQualityUpdater;
use GildedRose\ItemQualityUpdater\ConjuredItemQualityUpdater;
use GildedRose\ItemQualityUpdater\DefaultItemQualityUpdater;
use GildedRose\ItemQualityUpdater\SulfurasItemQualityUpdater;

final class GildedRoseFactory
{
    public static function withUpdaters(): GildedRose
    {
        return new GildedRose([
            Item::AGED_BRIE => new AgedBrieItemQualityUpdater(),
            Item::BACKSTAGE => new BackstageItemQualityUpdater(),
            Item::SULFURAS => new SulfurasItemQualityUpdater(),
            Item::CONJURED_MANA => new ConjuredItemQualityUpdater(),
            Item::DEFAULT => new DefaultItemQualityUpdater(),
        ]);
    }
}
