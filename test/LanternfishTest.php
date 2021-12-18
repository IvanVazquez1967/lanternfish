<?php

use PHPUnit\Framework\TestCase;
use App\Lanternfish;

class LanternfishTest extends TestCase
{
    protected function setUp()
    {
        $this->lanternfish = new Lanternfish();
    }

    /**
     * @dataProvider spawnProvider
     */
    public function testSpawn(int $days, string $initialState, int $expected)
    {
        $lanternfish = new Lanternfish();
        $this->assertEquals($expected, $lanternfish->spawn($initialState, $days));
    }

    public function spawnProvider(): array
    {
        return [
            [18, '3,4,3,1,2', 26],
            [80, '3,4,3,1,2', 5934]
        ];
    }

    public function testConstFile(): void
    {
        $this->assertFileExists('./lib/auxConst.php');
    }


}