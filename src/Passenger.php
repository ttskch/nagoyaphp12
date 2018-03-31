<?php

namespace Ttskch\Nagoyaphp12;

class Passenger
{
    /**
     * @var string
     */
    public $age;

    /**
     * @var string
     */
    public $class;

    /**
     * @var boolean
     */
    public $isFree;

    public function __construct(string $age, string $class)
    {
        $this->age = $age;
        $this->class = $class;
        $this->isFree = false;
    }

    public function getPrice(int $basePrice): int
    {
        if ($this->isFree) {
            return 0;
        }

        switch ($this->age . $this->class) {
            case 'An':
                return $basePrice;
            case 'Aw':
            case 'Cn':
            case 'In':
                return $this->getHalfPrice($basePrice);
            case 'Cw':
            case 'Iw':
                return $this->getHalfPrice($this->getHalfPrice($basePrice));
            case 'Ap':
            case 'Cp':
            case 'Ip':
            default:
                return 0;
        }
    }

    public function getHalfPrice(int $basePrice): int
    {
        return intval(round($basePrice * 0.5, -1));
    }
}
