<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\ItemQualityUpdater\ItemQualityUpdaterInterface;

final class GildedRose
{
    /** @var array<string, ItemQualityUpdaterInterface> */
    private array $updaters;

    public function __construct(array $updaters)
    {
        $this->updaters = $updaters;
    }

    public function updateQuality(array $items): array
    {
        return array_map(
            fn (Item $item) => $this->updateItemQuality($item),
            $items
        );
    }

    private function updateItemQuality(Item $item): Item
    {
        $updater = $this->findUpdater($item);

        return $updater->update($item);
    }

    private function findUpdater(Item $item): ItemQualityUpdaterInterface
    {
        return $this->updaters[$item->name()] ?? $this->updaters[Item::DEFAULT];
    }
}
