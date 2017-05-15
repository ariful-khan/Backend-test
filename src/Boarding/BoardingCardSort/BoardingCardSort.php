<?php

namespace Boarding\BoardingCardSort;

use Boarding\BoardingCardCollection\BoardingCardCollectionInterface;
use Boarding\BoardingCardCollection\BoardingCardCollection;
use Boarding\BoardingCard\BoardingCard;

class BoardingCardSort implements BoardingCardSortInterface
{
    /**
     * @param BoardingCardCollectionInterface $boardingCardCollection
     * @return BoardingCardCollectionInterface
     */
    public function sort(BoardingCardCollectionInterface $boardingCardCollection): BoardingCardCollectionInterface
    {
        $departureIndex = $this->getDepartureIndex($boardingCardCollection);
        $destinationIndex = $this->getDestinationIndex($boardingCardCollection);

        $journeyStartsAt = $this->findWhereJourneyStarts($departureIndex, $destinationIndex);

        $sortedBoardingCards[] = $journeyStartsAt;
        $currentLocation = $journeyStartsAt->getDestination();

        while (array_key_exists($currentLocation, $departureIndex)) {
            array_push($sortedBoardingCards, $departureIndex[$currentLocation]);
            $currentLocation = $departureIndex[$currentLocation]->getDestination();
        }

        return $this->getSortedBoardingCardCollection($sortedBoardingCards);
    }

    private function getSortedBoardingCardCollection(array $sortedBoardingCards): BoardingCardCollection
    {
        $boardingCardCollection = new BoardingCardCollection();

        foreach ($sortedBoardingCards as $sortedBoardingCard) {
            $boardingCardCollection->addBoardingCard($sortedBoardingCard);
        }

        return $boardingCardCollection;
    }

    /**
     * @param array $departures
     * @param array $destinationIndex
     * @return mixed|null
     */
    private function findWhereJourneyStarts(array $departures = [], array $destinationIndex = [])
    {
        $firstDeparture = null;
        foreach ($departures as $departure => $value) {
            if (!isset($destinationIndex[$departure])) {
                $firstDeparture = $value;
            }
            // else array_push($commonLocations, $departure);
        }

        return $firstDeparture;
    }


    /**
     * @param BoardingCardCollectionInterface $boardingCardCollection
     * @return array
     */
    private function getDepartureIndex(BoardingCardCollectionInterface $boardingCardCollection): array
    {
        $departureIndex = [];
        foreach ($boardingCardCollection->getBoardingCards() as $boardingCard) {
            /**
             * @var $boardingCard BoardingCard
             */
            $departureIndex[$boardingCard->getDeparture()] = $boardingCard;
        }
        return $departureIndex;
    }

    /**
     * @param BoardingCardCollectionInterface $boardingCardCollection
     * @return array
     */
    private function getDestinationIndex(BoardingCardCollectionInterface $boardingCardCollection): array
    {
        $destinationIndex = [];
        foreach ($boardingCardCollection->getBoardingCards() as $boardingCard) {
            /**
             * @var $boardingCard BoardingCard
             */
            $destinationIndex[$boardingCard->getDestination()] = $boardingCard;
        }
        return $destinationIndex;
    }
}
