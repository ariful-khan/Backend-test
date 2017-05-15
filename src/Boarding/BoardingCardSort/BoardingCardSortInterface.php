<?php

namespace Boarding\BoardingCardSort;

use Boarding\BoardingCardCollection\BoardingCardCollectionInterface;

interface BoardingCardSortInterface
{
    /**
     * @param BoardingCardCollectionInterface $boardingCardCollection
     * @return BoardingCardCollectionInterface
     */
    public function sort(BoardingCardCollectionInterface $boardingCardCollection) :BoardingCardCollectionInterface;
}
