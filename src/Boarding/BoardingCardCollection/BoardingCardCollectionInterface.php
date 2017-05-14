<?php

namespace Boarding\BoardingCardCollection;

use Boarding\BoardingCard\BoardingCard;

interface BoardingCardCollectionInterface
{
    public function addBoardingCard(BoardingCard $boardingCard);

    public function removeBoardingCard(BoardingCard $boardingCard);

    public function getBoardingCards();
}
