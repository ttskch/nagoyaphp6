<?php
/**
 * Created by PhpStorm.
 * User: takashi
 * Date: 2014/08/17
 * Time: 15:30
 */

namespace Nagoya\Dokaku;

use Nagoya\Dokaku\Exception\RuntimeException;

class InputParser
{
    public function parse($inputString)
    {
        $applications = [];

        $inputs = explode('|', $inputString);
        foreach ($inputs as $input) {
            $input = explode('_', $input);
            if (count($input) < 2) {
                throw new RuntimeException('invalid input');
            }
            if (!preg_match('/[1-5]{5}/', $input[1])) {
                var_dump($input);
                throw new RuntimeException('invalid input');
            }

            $id = intval($input[0]);
            $hopes = str_split($input[1]);
            foreach ($hopes as $key => $hope) {
                $hopes[$key] = intval($hope);
            }

            $applications[] = [
                'id' => $id,
                'hopes' => $hopes,
            ];
        }

        return $applications;
    }
}
