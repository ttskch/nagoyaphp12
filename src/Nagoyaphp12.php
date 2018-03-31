<?php
/**
 * This file is part of the Ttskch.Nagoyaphp12
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ttskch\Nagoyaphp12;

class Nagoyaphp12
{
    public function run(string $input): string
    {
        $parser = new InputParser();
        $boarding = $parser->parse($input);

        return $boarding->calculateTotalPrice();
    }
}
