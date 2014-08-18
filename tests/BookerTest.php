<?php

namespace Nagoya\Dokaku;

class BookerTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $booker = new Booker();

        $applications = [
            new Application(17, [3, 4, 1, 5, 2]),
            new Application(89, [2, 3, 4, 5, 1]),
            new Application(49, [4, 3, 1, 5, 2]),
            new Application(61, [3, 2, 5, 4, 1]),
            new Application(15, [2, 5, 4, 1, 3]),
            new Application(63, [3, 4, 5, 2, 1]),
            new Application(16, [3, 1, 4, 5, 2]),
            new Application(8,  [4, 1, 3, 5, 2]),
            new Application(54, [4, 1, 5, 3, 2]),
            new Application(42, [3, 4, 5, 2, 1]),
            new Application(53, [1, 2, 4, 5, 3]),
            new Application(88, [3, 4, 2, 5, 1]),
            new Application(4,  [2, 1, 4, 5, 3]),
            new Application(93, [3, 4, 5, 1, 2]),
            new Application(18, [2, 5, 1, 3, 4]),
            new Application(67, [2, 5, 1, 3, 4]),
            new Application(50, [1, 4, 5, 2, 3]),
        ];

        foreach ($applications as $application) {
            $booker->book($application);
        }

        $this->assertEquals([
            0 => [
                1 => [53, 50],
                2 => [89, 15, 4, 18, 67],
                3 => [17, 61, 63, 16, 42, 88, 93],
                4 => [49, 8, 54],
                5 => [],
            ],
            1 => [
                1 => [16, 8, 54, 4],
                2 => [61, 53],
                3 => [89, 49],
                4 => [17, 63, 42, 88, 93, 50],
                5 => [15, 18, 67],
            ],
            2 => [
                1 => [17, 49, 18, 67],
                2 => [88],
                3 => [8],
                4 => [89, 15, 16, 53, 4],
                5 => [61, 63, 54, 42, 93, 50],
            ],
            3 => [
                1 => [15, 93],
                2 => [63, 42, 50],
                3 => [54, 18, 67],
                4 => [61],
                5 => [17, 89, 49, 16, 8, 53, 88, 4],
            ],
            4 => [
                1 => [89, 61, 63, 42, 88],
                2 => [17, 49, 16, 8, 54, 93],
                3 => [15, 53, 4, 50],
                4 => [18, 67],
                5 => [],
            ],
        ], $booker->getTable());

        $this->assertEquals([
            1 => [53, 50],
            2 => [89, 15, 4, 18],
            3 => [17, 61, 63, 16],
            4 => [49, 8, 54, 42],
            5 => [67, 93, 88],
        ], $booker->elect());
    }
}
