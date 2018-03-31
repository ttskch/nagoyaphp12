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

    public function calculateTotalPrice(): int
    {
        $this->setFreeToInfants();

        $totalPrice = 0;

        foreach ($this->passengers as $passenger) {
            $totalPrice += $passenger->getPrice($this->basePrice);
        }

        return $totalPrice;
    }

    public function setFreeToInfants(): void
    {
        $adultsNum = 0;
        $infants = [];

        foreach ($this->passengers as $passenger) {
            switch ($passenger->age) {
                case 'A':
                    $adultsNum++;
                    break;
                case 'I':
                    $infants[] = $passenger;
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

        for ($i = 0; $i < $adultsNum * 2 && $i < count($infants); $i++) {
            $infants[$i]->isFree = true;
        }
    }
}
