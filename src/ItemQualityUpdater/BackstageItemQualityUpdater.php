<?php

declare(strict_types=1);

namespace GildedRose\ItemQualityUpdater;

use GildedRose\Item;

final class BackstageItemQualityUpdater implements ItemQualityUpdaterInterface
{
    public function update(Item $item): Item
    {
        $this->verifyCanUpdate($item);

        $sellIn = $item->sellIn();
        $quality = $item->quality();

        if ($quality < 50) {
            ++$quality;
            if (($sellIn < 11) && $quality < 50) {
                ++$quality;
            }
            if (($sellIn < 6) && $quality < 50) {
                ++$quality;
            }
        }
        --$sellIn;

        if ($sellIn < 0) {
            $quality -= $quality;
        }

        return Item::backstage($sellIn, $quality);
    }

    private function canUpdate(Item $item): bool
    {
        return $item->name() === Item::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT;
    }

    private function verifyCanUpdate(Item $item): void
    {
        if (!$this->canUpdate($item)) {
            throw new \RuntimeException('No es updatable!!! :(');
        }
    }
}
