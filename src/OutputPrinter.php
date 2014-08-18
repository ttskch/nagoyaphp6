<?php

namespace Nagoya\Dokaku;

class OutputPrinter
{
    public function dump(array $elected)
    {
        $list = [];
        foreach ($elected as $day => $staffs) {
            if (count($staffs)) {
                asort($staffs);
                $list[] = $day . '_' . implode(':', $staffs);
            }
        }
        return implode('|', $list);
    }
}
