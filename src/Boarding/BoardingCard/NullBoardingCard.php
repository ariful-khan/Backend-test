<?php

namespace Boarding\BoardingCard;

class NullBoardingCard extends BoardingCard
{
    public function __construct()
    {
        parent::__construct('', '', '');
    }
}
