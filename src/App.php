<?php
require __DIR__  . '/../vendor/autoload.php';

use TravelApp\TravelApp;
use FakeApi\FakePassengerBoardingApi;
use Boarding\BoardingCardSort\BoardingCardSort;


$fakeApi = new FakePassengerBoardingApi();
$boardingCardSorter = new BoardingCardSort();

$app = new TravelApp($fakeApi, $boardingCardSorter);

echo $app->getFermentedTravelStepsByPassengerId(101);
