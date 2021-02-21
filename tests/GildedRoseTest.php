<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRoseFactory;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [Item::default('foo', 0, 0)];

        $gildedRose = GildedRoseFactory::withUpdaters();
        $actual = $gildedRose->updateQuality($items);

        self::assertSame('foo', $actual[0]->name());
    }

//    public function testAgedBrieUpdaterWithNoAgedBrieItem(): void
//    {
//        $items = [
//            Item::default('foo', 0, 0)
//        ];
//
//        $gildedRose = new GildedRose([
//            new AgedBrieItemQualityUpdater(),
//            new AgedBrieItemQualityUpdater(),
//            new AgedBrieItemQualityUpdater()
//        ]);
//
//        $actual = $gildedRose->updateQuality($items);
//
//        self::assertEquals($items, $actual);
//    }
}
