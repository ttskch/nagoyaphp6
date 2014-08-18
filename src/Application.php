<?php
/**
 * Created by PhpStorm.
 * User: t-kanemoto
 * Date: 2014/08/18
 * Time: 11:35
 */

namespace Nagoya\Dokaku;

class Application
{
    private $staffId;
    private $priorities;

    public function __construct($staffId, $priorities)
    {
        $this->staffId = $staffId;
        $this->priorities = $priorities;
    }

    public function getStaffId()
    {
        return $this->staffId;
    }

    public function getPriorities()
    {
        return $this->priorities;
    }
}
