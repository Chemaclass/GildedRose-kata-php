<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\ItemQualityUpdater\AgedBrieItemQualityUpdater;
use GildedRose\ItemQualityUpdater\BackstageItemQualityUpdater;
use GildedRose\ItemQualityUpdater\DefaultItemQualityUpdater;
use GildedRose\ItemQualityUpdater\SulfurasItemQualityUpdater;

final class GildedRoseFactory
{
    public static function withUpdaters(): GildedRose
    {
        return new GildedRose([
            Item::AGED_BRIE => new AgedBrieItemQualityUpdater(),
            Item::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT => new BackstageItemQualityUpdater(),
            Item::SULFURAS_HAND_OF_RAGNAROS => new SulfurasItemQualityUpdater(),
            Item::DEFAULT => new DefaultItemQualityUpdater(),
        ]);
    }
}
