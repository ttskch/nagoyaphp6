<?php

namespace Nagoya\Dokaku;

class InputParserTest extends \PHPUnit_Framework_TestCase
{
    private $parser;

    protected function setUp()
    {
        $this->parser = new InputParser();
    }

    public function test()
    {
        $applications = $this->parser->parse('3_12345|2_12345|1_12345');
        $this->assertEquals($applications[0]->getStaffId(), 3);
        $this->assertEquals($applications[0]->getPriorities(), [1, 2, 3, 4, 5]);
        $this->assertEquals($applications[1]->getStaffId(), 2);
        $this->assertEquals($applications[1]->getPriorities(), [1, 2, 3, 4, 5]);
        $this->assertEquals($applications[2]->getStaffId(), 1);
        $this->assertEquals($applications[2]->getPriorities(), [1, 2, 3, 4, 5]);
    }
}
