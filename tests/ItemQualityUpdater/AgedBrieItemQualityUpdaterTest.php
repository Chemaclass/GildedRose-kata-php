<?php

declare(strict_types=1);

namespace Tests\ItemQualityUpdater;

use GildedRose\Item;
use GildedRose\ItemQualityUpdater\AgedBrieItemQualityUpdater;
use PHPUnit\Framework\TestCase;

final class AgedBrieItemQualityUpdaterTest extends TestCase
{
    public function testUpdate(): void
    {
        $item = Item::agedBrie(1, 2);

        $updater = new AgedBrieItemQualityUpdater();
        $actual = $updater->update($item);

        self::assertEquals(Item::agedBrie(0, 3), $actual);
    }
}
