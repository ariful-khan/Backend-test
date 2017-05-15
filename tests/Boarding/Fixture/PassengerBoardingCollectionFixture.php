<?php

namespace Test\Boarding\Fixture;

use Boarding\BoardingCardCollection\BoardingCardCollection;
use Boarding\BoardingCard\BoardingCardFactory;

class PassengerBoardingCollectionFixture
{
    /**
     * @return BoardingCardCollection
     */
    public static function getBoardingCollection(): BoardingCardCollection
    {
        $boardingCardCollection = new BoardingCardCollection();

        $boardingCardCollection->addBoardingCard(BoardingCardFactory::build
        (
            (object)[
                'departure' => 'Madrid',
                'destination' => 'Barcelona',
                'seat' => '45B',
                'type' => 'train',
                'trainCode' => '78A'
            ]
        ));

        $boardingCardCollection->addBoardingCard(BoardingCardFactory::build
        (
            (object)[
                'departure' => 'Stockholm',
                'destination' => 'New York JFK',
                'seat' => '7B',
                'gate' => '22',
                'type' => 'flight',
                'flight' => 'SK22',
                'counter' => ''
            ]
        ));

        $boardingCardCollection->addBoardingCard(BoardingCardFactory::build
        (
            (object)[
                'departure' => 'Barcelona',
                'destination' => 'Gerona Airport',
                'seat' => '',
                'type' => 'airport bus'
            ]
        ));

        $boardingCardCollection->addBoardingCard(BoardingCardFactory::build
        (
            (object)[
                'departure' => 'Gerona Airport',
                'destination' => 'Stockholm',
                'seat' => '3A',
                'gate' => '45B',
                'type' => 'flight',
                'counter' => '344',
                'flight' => '344'
            ]
        ));

        return $boardingCardCollection;
    }
}
