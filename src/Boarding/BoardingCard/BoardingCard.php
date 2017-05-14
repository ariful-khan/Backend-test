<?php

namespace Boarding\BoardingCard;

abstract class BoardingCard
{
    /**
     * @var string
     */
    private $departure;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $seat;

    /**
     * @param string $departure
     * @param string $destination
     * @param string $seat
     */
    public function __construct(string $departure, string $destination, string $seat)
    {
        $this->departure = $departure;
        $this->destination = $destination;
        $this->seat = $seat;
    }

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }
}
