<?php

namespace Boarding\BoardingCardSort;

use Boarding\BoardingCardCollection\{
    BoardingCardCollectionInterface, BoardingCardCollection
};
use Boarding\BoardingCard\{
    BoardingCard, NullBoardingCard
};

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
        return $this->getSortedCards($departureIndex, $journeyStartsAt);
    }

    /**
     * @param $departureIndex
     * @param $journeyStartsAt
     * @return BoardingCardCollectionInterface
     */
    private function getSortedCards(array $departureIndex, BoardingCard $journeyStartsAt): BoardingCardCollectionInterface
    {
        $sortedBoardingCards[] = $journeyStartsAt;
        $currentLocation = $journeyStartsAt->getDestination();

        while (array_key_exists($currentLocation, $departureIndex)) {
            $sortedBoardingCards[] = $departureIndex[$currentLocation];
            $currentLocation = $departureIndex[$currentLocation]->getDestination();
        }

        return $this->getSortedBoardingCardCollection($sortedBoardingCards);
    }

    /**
     * @param array $sortedBoardingCards
     * @return BoardingCardCollection
     */
    private function getSortedBoardingCardCollection(array $sortedBoardingCards): BoardingCardCollection
    {
        $boardingCardCollection = new BoardingCardCollection();

        foreach ($sortedBoardingCards as $sortedBoardingCard) {
            $boardingCardCollection->addBoardingCard($sortedBoardingCard);
        }

        return $boardingCardCollection;
    }

    /**
     * @param array $departureIndex
     * @param array $destinationIndex
     * @return BoardingCard
     */
    private function findWhereJourneyStarts(array $departureIndex, array $destinationIndex): BoardingCard
    {
        $firstDepartureLocation = array_diff(array_keys($departureIndex), array_keys($destinationIndex));

        if (count($firstDepartureLocation) !== 1) {
            return new NullBoardingCard();
        }

        return $departureIndex[$firstDepartureLocation[0]];
    }

    /**
     * @param BoardingCardCollectionInterface $boardingCardCollection
     * @return array
     */
    private function getDepartureIndex(BoardingCardCollectionInterface $boardingCardCollection): array
    {
        $departureIndex = [];
        foreach ($boardingCardCollection->getBoardingCards() as $boardingCard) {
            /** @var $boardingCard BoardingCard */
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
            /** @var $boardingCard BoardingCard */
            $destinationIndex[$boardingCard->getDestination()] = $boardingCard;
        }

        return $destinationIndex;
    }
}
