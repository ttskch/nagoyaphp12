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
}
