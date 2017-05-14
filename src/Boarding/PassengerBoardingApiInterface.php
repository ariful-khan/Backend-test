<?php

namespace Boarding;

interface PassengerBoardingApiInterface
{
    public function getBoardingCardsByPassenger($passenger);
}
