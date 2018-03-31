<?php

namespace Ttskch\Nagoyaphp12;

class Passenger
{
    public $age;
    public $type;

    public function __construct(string $age, string $type)
    {
        $this->age = $age;
        $this->type = $type;
    }
}
