<?php

namespace Boarding\BoardingCardCollection;

use Boarding\BoardingCard\BoardingCard;

class BoardingCardCollection implements BoardingCardCollectionInterface
{
    private $boardingCards = [];

    /**
     * @param BoardingCard $boardingCard
     */
    public function addBoardingCard(BoardingCard $boardingCard)
    {
        $this->boardingCards[] = $boardingCard;
    }

    /**
     * @param BoardingCard $boardingCard
     */
    public function removeBoardingCard(BoardingCard $boardingCard)
    {
        unset($this->boardingCards[array_search($boardingCard, $this->boardingCards)]);
    }

    /**
     * @return array
     */
    public function getBoardingCards(): array
    {
        return $this->boardingCards;
    }
}
