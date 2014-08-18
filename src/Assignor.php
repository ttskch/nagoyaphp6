<?php
/**
 * Created by PhpStorm.
 * User: takashi
 * Date: 2014/08/17
 * Time: 15:21
 */

namespace Nagoya\Dokaku;

class Assignor
{
    private $capacities;
    private $lessons;

    public function __construct()
    {
        $this->capacities = [
            4,
            4,
            4,
            4,
            4,
        ];
    }

    public function assign(array $applications)
    {
        $lessons = [
            [],
            [],
            [],
            [],
            [],
        ];

        foreach ($applications as $application) {
            $id = $application['id'];
            $hopes = $application['hopes'];

            foreach ($hopes as $hope) {
                $hope--;
                if (count($lessons[$hope]) < $this->capacities[$hope]) {
                    $lessons[$hope][] = $id;
                    break;
                }
            }
        }

        return $this->printResult($lessons);
    }

    private function printResult(array $lessons)
    {
        $days = [];
        foreach ($lessons as $key => $people) {
            $day = $key + 1;
            if (count($people)) {
                asort($people);
                $days[] = $day . '_' . implode(':', $people);
            }
        }
        return implode('|', $days);
    }
}
