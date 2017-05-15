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
                    'trainCode' => '78A'
                ],
                [
                    'departure' => 'Stockholm',
                    'destination' => 'New York JFK',
                    'seat' => '7B',
                    'gate' => '22',
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
                    'gate' => '45B',
                    'type' => 'flight',
                    'counter' => '344',
                    'flight' => '344'
                ]
            ]
        );
    }
}
