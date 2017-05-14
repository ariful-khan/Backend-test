<?php

namespace FakeApi;

use Boarding\PassengerBoardingApiInterface;

class FakePassengerBoardingApi implements PassengerBoardingApiInterface
{
    /**
     * @param $passenger
     * @return string
     */
    public function getBoardingCardsByPassenger($passenger)
    {
        return json_encode(
            [
                [
                    'departure' => 'Madrid',
                    'destination' => 'Barcelona',
                    'seat' => '45B',
                    'type' => 'train',
                    'TransportNumber' => '78A'
                ],
                [
                    'from' => 'Stockholm',
                    'to' => 'New York JFK',
                    'seat' => '7B',
                    'Gate' => '22',
                    'type' => 'flight',
                    'flight' => 'SK22',
                    'counter' => ''
                ],
                [
                    'departure' => 'Barcelona',
                    'destination' => 'Gerona Airport',
                    'seat' => '',
                    'type' => 'airport bus'
                ],
                [
                    'departure' => 'Gerona Airport',
                    'destination' => 'Stockholm',
                    'seat' => '3A',
                    'Gate' => '45B',
                    'type' => 'flight',
                    'counter' => '344',
                    'flight' => '344'
                ]
            ]
        );
    }
}
