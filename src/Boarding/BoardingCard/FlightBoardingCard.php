<?php

namespace Boarding\BoardingCard;

class FlightBoardingCard extends BoardingCard
{
    /**
     * @var string
     */
    private $flight;
    /**
     * @var string
     */
    private $gate;
    /**
     * @var string
     */
    private $counter;

    public function __construct
    (
        string $departure,
        string $destination,
        string $seat,
        string $flight,
        string $gate,
        string $counter
    )
    {
        parent::__construct($departure, $destination, $seat);
        $this->gate = $gate;
        $this->counter = $counter;
        $this->flight = $flight;
    }

    /**
     * @return string
     */
    public function getFlight(): string
    {
        return $this->flight;
    }

    /**
     * @param string $flight
     */
    public function setFlight(string $flight)
    {
        $this->flight = $flight;
    }

    /**
     * @return string
     */
    public function getGate(): string
    {
        return $this->gate;
    }

    /**
     * @param string $gate
     */
    public function setGate(string $gate)
    {
        $this->gate = $gate;
    }

    /**
     * @return string
     */
    public function getCounter(): string
    {
        return $this->counter;
    }

    /**
     * @param string $counter
     */
    public function setCounter(string $counter)
    {
        $this->counter = $counter;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return 'From ' . $this->getDeparture() . ', take flight ' . $this->flight . ' to ' . $this->getDestination() . '. Gate ' . $this->gate . ', seat ' . $this->getSeat() . '. ' . ($this->counter ? 'Baggage drop at ticket counter ' . $this->counter . '.' : 'Baggage will be automatically transferred from your last leg.');
    }
}
