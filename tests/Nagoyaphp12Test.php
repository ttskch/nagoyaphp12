<?php
namespace Ttskch\Nagoyaphp12;

use PHPUnit\Framework\TestCase;

class Nagoyaphp12Test extends TestCase
{
    /**
     * @var Nagoyaphp12
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new Nagoyaphp12;
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\Ttskch\Nagoyaphp12\Nagoyaphp12', $actual);
    }
}
