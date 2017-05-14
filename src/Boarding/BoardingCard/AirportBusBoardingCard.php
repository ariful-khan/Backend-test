<?php

namespace Boarding\BoardingCard;


class AirportBusBoardingCard extends BoardingCard
{
    /**
     * @return string
     */
    public function toString(): string
    {
        $instruction = 'Take the airport bus from ' . $this->getDeparture() . ' to ' . $this->getDestination() . '. ';
        $seat = $this->getSeat() ? 'Sit in seat ' . $this->getSeat() . '.' : 'No seat assignment.';
        $instruction .= $seat;
        return $instruction;
    }
}
