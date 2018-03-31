<?php

namespace Ttskch\Nagoyaphp12;

class Boarding
{
    /**
     * @var int
     */
    public $basePrice;

    /**
     * @var Passenger[]
     */
    public $passengers;

    public function __construct(int $basePrice, array $passengers)
    {
        $this->basePrice = $basePrice;
        $this->passengers = $passengers;
    }

    public function calculateTotalPrice()
    {
        $infants = [];
        $adults = [];

        foreach ($this->passengers as $passenger) {
            switch ($passenger->age) {
                case 'I':
                    $infants[] = $passenger;
                    break;
                case 'A':
                    $adults[] = $passenger;
                    break;
            }
        }

        // asc
        usort($infants, function (Passenger $a, Passenger $b) {
            switch ($a->class . $b->class) {
                case 'nn':
                case 'ww':
                case 'pp':
                    return 0;
                case 'nw':
                case 'np':
                case 'wp':
                    return 1;
                case 'wn':
                case 'pw':
                case 'pn':
                    return -1;
            }
        });

        // desc
        $infants = array_reverse($infants);

        for ($i = 0; $i < count($adults) * 2 && $i < count($infants); $i++) {
            $infants[$i]->isFree = true;
        }

        $totalPrice = 0;

        foreach ($this->passengers as $passenger) {
            $totalPrice += $passenger->getPrice($this->basePrice);
        }

        return $totalPrice;
    }
}
