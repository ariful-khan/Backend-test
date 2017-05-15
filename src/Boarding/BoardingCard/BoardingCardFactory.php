<?php

namespace Boarding\BoardingCard;

class BoardingCardFactory
{
    public static function build($boardingData)
    {
        switch ($boardingData->type) {
            case BoardingType::AIRPORT_BUS:
                return new AirportBusBoardingCard(
                    $boardingData->departure,
                    $boardingData->destination,
                    $boardingData->seat
                );
            case BoardingType::FLIGHT:
                return new FlightBoardingCard(
                    $boardingData->departure,
                    $boardingData->destination,
                    $boardingData->seat,
                    $boardingData->flight,
                    $boardingData->gate,
                    $boardingData->counter
                );
            case BoardingType::TRAIN:
                return new TrainBoardingCard(
                    $boardingData->departure,
                    $boardingData->destination,
                    $boardingData->seat,
                    $boardingData->trainCode
                );
            default:
                throw new \Exception('boarding card type not found' . ' ' . $boardingData->type);
        }
    }
}
