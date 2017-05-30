<?php

namespace TravelApp;

use Boarding\PassengerBoardingApiInterface;
use Boarding\BoardingCardSort\BoardingCardSortInterface;
use Boarding\BoardingCardCollection\BoardingCardCollectionInterface;
use Boarding\BoardingCardCollection\BoardingCardCollection;
use Boarding\BoardingCard\BoardingCardFactory;

class TravelApp
{
    private $api;

    private $sorter;

    /**
     * @param PassengerBoardingApiInterface $api
     * @param BoardingCardSortInterface $sorter
     */
    public function __construct(PassengerBoardingApiInterface $api, BoardingCardSortInterface $sorter)
    {
        $this->api = $api;
        $this->sorter = $sorter;
    }

    /**
     * @param $passengerId
     * @return string
     */
    public function getFermentedTravelStepsByPassengerId($passengerId): string
    {
        $boardingData = json_decode($this->api->getBoardingCardsByPassenger($passengerId));
        $boardingCardCollection = $this->getBoardingCardCollection($boardingData);
        $boardingCardCollectionSorted = $this->sorter->sort($boardingCardCollection);

        return $this->getFormattedText($boardingCardCollectionSorted);

    }

    /**
     * @param array $boardingData
     * @return BoardingCardCollectionInterface
     */
    private function getBoardingCardCollection(array $boardingData): BoardingCardCollectionInterface
    {
        $boardingCardCollection = new BoardingCardCollection();

        foreach ($boardingData as $datum) {
            $boardingCardCollection->addBoardingCard(BoardingCardFactory::build((object)$datum));
        }

        return $boardingCardCollection;
    }

    /**
     * @param BoardingCardCollectionInterface $boardingCardCollectionSorted
     * @return string
     */
    private function getFormattedText(BoardingCardCollectionInterface $boardingCardCollectionSorted): string
    {
        $steps = "";
        $step = 1;
        foreach ($boardingCardCollectionSorted->getBoardingCards() as $boardingCard) {
            $steps .= "$step. $boardingCard->toString()\n";
            $step++;
        }
        $steps .= "Baggage will we automatically transferred from your last leg.\n";
        $steps .= "$step. You have arrived at your final destination.\n";

        return $steps;
    }
}
