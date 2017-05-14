<?php

namespace Test\Boarding\BoardingCard;

use Boarding\BoardingCard\BoardingCardFactory;

use PHPUnit\Framework\TestCase;

class BoardingCardFactoryTest extends TestCase
{
    public function testTrainBuild()
    {
        $train = new \stdClass();
        $train->departure = 'Dubai';
        $train->destination = 'Berlin';
        $train->seat = '9F';
        $train->type = 'train';
        $train->trainCode = 'T29';

        $this->assertInstanceOf('Boarding\BoardingCard\TrainBoardingCard', BoardingCardFactory::build($train));
    }

    public function testFlightBuild()
    {
        $train = new \stdClass();
        $train->departure = 'Dubai';
        $train->destination = 'Berlin';
        $train->seat = '9F';
        $train->type = 'flight';
        $train->flight = 'B504';
        $train->gate = 'A29';
        $train->counter = '5';

        $this->assertInstanceOf('Boarding\BoardingCard\FlightBoardingCard', BoardingCardFactory::build($train));
    }

    public function testAirportBusBuild()
    {
        $train = new \stdClass();
        $train->departure = 'Dubai';
        $train->destination = 'Berlin';
        $train->seat = '9F';
        $train->type = 'airport_bus';

        $this->assertInstanceOf('Boarding\BoardingCard\AirportBusBoardingCard', BoardingCardFactory::build($train));
    }
}
