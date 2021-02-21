<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\ItemQualityUpdater\ItemQualityUpdaterInterface;

final class GildedRose
{
    /** @var ItemQualityUpdaterInterface[] */
    private array $updaters;

    public function __construct(array $updaters)
    {
        $this->updaters = $updaters;
    }

    public function updateQuality(array $items): array
    {
        return array_map(
            fn (Item $item) => $this->findUpdater($item)->update($item),
            $items
        );
    }

    private function findUpdater(Item $item): ItemQualityUpdaterInterface
    {
        return $this->updaters[$item->name()] ?? $this->updaters[Item::DEFAULT];
    }
}
