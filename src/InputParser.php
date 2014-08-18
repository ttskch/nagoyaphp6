<?php

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

            // 形式チェック.
            if (count($input) < 2) {
                throw new RuntimeException('invalid input');
            }
            if (!preg_match('/[1-5]{5}/', $input[1])) {
                throw new RuntimeException('invalid input');
            }

            $id = intval($input[0]);
            $priorities = str_split($input[1]);

            // 希望曜日の重複チェック.
            if (count(array_unique($priorities)) !== 5) {
                throw new RuntimeException('invalid input');
            }

            foreach ($priorities as $key => $priority) {
                $priorities[$key] = intval($priority);
            }

            $applications[] = new Application($id, $priorities);
        }

        return $applications;
    }
}
