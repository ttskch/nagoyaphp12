<?php

namespace Ttskch\Nagoyaphp12;

class InputParser
{
    public function parse(string $input)
    {
        list($rawBasePrice, $rawPassengers) = explode(':', $input);

        $basePrice = intval($rawBasePrice);
        $passengers = [];

        foreach (explode(',', $rawPassengers) as $rawPassenger) {
            $passengers[] = new Passenger(substr($rawPassenger, 0, 1), substr($rawPassenger, 1, 1));
        }

        $boarding = new Boarding($basePrice, $passengers);
    }
}
