<?php

namespace Test\Boarding\BoardingCardSort;

use PHPUnit\Framework\TestCase;

use Test\Boarding\Fixture\PassengerBoardingCollectionFixture;

use Boarding\BoardingCardSort\BoardingCardSort;
use Boarding\BoardingCard\BoardingCard;
use Boarding\BoardingCardCollection\BoardingCardCollection;

class BoardingCardSortTest extends TestCase
{
    public function testSortBoardingCard()
    {
        $boardingCollection = PassengerBoardingCollectionFixture::getBoardingCollection();

        $BoardingCardSort = new BoardingCardSort();
        $boardingCollectionSorted = $BoardingCardSort->sort($boardingCollection);
        $sortedBoardingCard = $boardingCollectionSorted->getBoardingCards();

        /**
         * @var $point BoardingCard
         */
        $point = $sortedBoardingCard[0];
        $this->assertEquals('Madrid', $point->getDeparture());
        $this->assertEquals('Barcelona', $point->getDestination());
        $this->assertEquals('45B', $point->getSeat());

        $point = $sortedBoardingCard[1];
        $this->assertEquals('Barcelona', $point->getDeparture());
        $this->assertEquals('Gerona Airport', $point->getDestination());
        $this->assertEquals('', $point->getSeat());

        $point = $sortedBoardingCard[2];
        $this->assertEquals('Gerona Airport', $point->getDeparture());
        $this->assertEquals('Stockholm', $point->getDestination());
        $this->assertEquals('3A', $point->getSeat());

        $point = $sortedBoardingCard[3];
        $this->assertEquals('Stockholm', $point->getDeparture());
        $this->assertEquals('New York JFK', $point->getDestination());
        $this->assertEquals('7B', $point->getSeat());
    }

    public function testSortWithNoStarting()
    {
        $boardingCollection = PassengerBoardingCollectionFixture::getBoardingCollectionWithNoStartingPoint();

        $BoardingCardSort = new BoardingCardSort();
        $boardingCollectionSorted = $BoardingCardSort->sort($boardingCollection);
        $sortedBoardingCard = $boardingCollectionSorted->getBoardingCards();

        $this->assertCount(1, $sortedBoardingCard);
        $this->assertInstanceOf('Boarding\BoardingCard\NullBoardingCard', $sortedBoardingCard[0]);
    }

    public function testSortWithEmptyBoardingCollection()
    {
        $boardingCardCollection = new BoardingCardCollection();

        $BoardingCardSort = new BoardingCardSort();
        $boardingCollectionSorted = $BoardingCardSort->sort($boardingCardCollection);
        $sortedBoardingCard = $boardingCollectionSorted->getBoardingCards();

        $this->assertCount(1, $sortedBoardingCard);
        $this->assertInstanceOf('Boarding\BoardingCard\NullBoardingCard', $sortedBoardingCard[0]);
    }
}
