<?php

namespace Nagoya\Dokaku;

class Booker
{
    private $table;
    private $capacities;

    public function __construct()
    {
        $this->table = [
            0 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
            1 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
            2 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
            3 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
            4 => [1 => [], 2 => [], 3 => [], 4 => [], 5 => []],
        ];
        $this->capacities = [
            1 => 4,
            2 => 4,
            3 => 4,
            4 => 4,
            5 => 4,
        ];
    }

    public function book(Application $application)
    {
        foreach ($application->getPriorities() as $priority => $day) {
            $this->table[$priority][$day][] = $application->getStaffId();
        }
    }

    public function elect()
    {
        $elected = [
            1 => [],
            2 => [],
            3 => [],
            4 => [],
            5 => [],
        ];
        $used = [];

        foreach ($this->table as $priority => $bookings) {
            foreach ($bookings as $day => $staffs) {
                foreach ($staffs as $staffId) {
                    if (!in_array($staffId, $used) && count($elected[$day]) < $this->capacities[$day]) {
                        $elected[$day][] = $staffId;
                        $used[] = $staffId;
                    }
                }
            }
        }
        return $elected;
    }

    public function getTable()
    {
        return $this->table;
    }

}
