<?php

namespace Test\Boarding\BoardingCardSort;

use PHPUnit\Framework\TestCase;

use Test\Boarding\Fixture\PassengerBoardingCollectionFixture;

use Boarding\BoardingCardSort\BoardingCardSort;
use Boarding\BoardingCard\BoardingCard;

class BoardingCardSortTest extends TestCase
{
    public function testSort()
    {
        $boardingCollection = PassengerBoardingCollectionFixture::getBoardingCollection();

        $BoardingCardSort = new BoardingCardSort();
        $boardingCollectionSorted = $BoardingCardSort->sort($boardingCollection);
        $sortedBoardingCard = $boardingCollectionSorted->getBoardingCards();

        /**
         * @var $startPoint BoardingCard
         */
        $startPoint = $sortedBoardingCard[0];
        $this->assertEquals('Madrid', $startPoint->getDeparture());
        $this->assertEquals('Barcelona', $startPoint->getDestination());
        $this->assertEquals('45B', $startPoint->getSeat());

        /**
         * @var $startPoint BoardingCard
         */
        $endPoint = $sortedBoardingCard[3];
        $this->assertEquals('Stockholm', $endPoint->getDeparture());
        $this->assertEquals('New York JFK', $endPoint->getDestination());
        $this->assertEquals('7B', $endPoint->getSeat());
    }
}