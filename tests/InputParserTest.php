<?php
/**
 * Created by PhpStorm.
 * User: takashi
 * Date: 2014/08/17
 * Time: 15:44
 */

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
        $applications = $this->parser->parse('1_12345');
        $this->assertEquals($applications[0]['id'], 1);
        $this->assertEquals($applications[0]['hopes'], [1,2,3,4,5]);

        $applications = $this->parser->parse('55_24153|91_24531|9_12543|41_34215|72_15423|44_42531|6_42351|79_15243|21_35412|31_52413|74_24135|83_31254|33_35421|84_53421|89_53241|16_32415|36_15234|92_34521|62_12345|14_23415|40_23415|88_43251|52_45213|77_32154|59_53241');
        $this->assertEquals($applications[0]['id'], 55);
        $this->assertEquals($applications[0]['hopes'], [2,4,1,5,3]);

        $this->assertEquals($applications[0]['id'], 55);
        $this->assertEquals($applications[0]['hopes'], [2,4,1,5,3]);

        $this->assertEquals($applications[1]['id'], 91);
        $this->assertEquals($applications[1]['hopes'], [2,4,5,3,1]);

        $this->assertEquals($applications[2]['id'], 9);
        $this->assertEquals($applications[2]['hopes'], [1,2,5,4,3]);

        $this->assertEquals($applications[3]['id'], 41);
        $this->assertEquals($applications[3]['hopes'], [3,4,2,1,5]);

        $this->assertEquals($applications[4]['id'], 72);
        $this->assertEquals($applications[4]['hopes'], [1,5,4,2,3]);

        $this->assertEquals($applications[5]['id'], 44);
        $this->assertEquals($applications[5]['hopes'], [4,2,5,3,1]);

        $this->assertEquals($applications[6]['id'], 6);
        $this->assertEquals($applications[6]['hopes'], [4,2,3,5,1]);

        $this->assertEquals($applications[7]['id'], 79);
        $this->assertEquals($applications[7]['hopes'], [1,5,2,4,3]);

        $this->assertEquals($applications[8]['id'], 21);
        $this->assertEquals($applications[8]['hopes'], [3,5,4,1,2]);

        $this->assertEquals($applications[9]['id'], 31);
        $this->assertEquals($applications[9]['hopes'], [5,2,4,1,3]);

        $this->assertEquals($applications[10]['id'], 74);
        $this->assertEquals($applications[10]['hopes'], [2,4,1,3,5]);

        $this->assertEquals($applications[11]['id'], 83);
        $this->assertEquals($applications[11]['hopes'], [3,1,2,5,4]);

        $this->assertEquals($applications[12]['id'], 33);
        $this->assertEquals($applications[12]['hopes'], [3,5,4,2,1]);

        $this->assertEquals($applications[13]['id'], 84);
        $this->assertEquals($applications[13]['hopes'], [5,3,4,2,1]);

        $this->assertEquals($applications[14]['id'], 89);
        $this->assertEquals($applications[14]['hopes'], [5,3,2,4,1]);

        $this->assertEquals($applications[15]['id'], 16);
        $this->assertEquals($applications[15]['hopes'], [3,2,4,1,5]);

        $this->assertEquals($applications[16]['id'], 36);
        $this->assertEquals($applications[16]['hopes'], [1,5,2,3,4]);

        $this->assertEquals($applications[17]['id'], 92);
        $this->assertEquals($applications[17]['hopes'], [3,4,5,2,1]);

        $this->assertEquals($applications[18]['id'], 62);
        $this->assertEquals($applications[18]['hopes'], [1,2,3,4,5]);

        $this->assertEquals($applications[19]['id'], 14);
        $this->assertEquals($applications[19]['hopes'], [2,3,4,1,5]);

        $this->assertEquals($applications[20]['id'], 40);
        $this->assertEquals($applications[20]['hopes'], [2,3,4,1,5]);

        $this->assertEquals($applications[21]['id'], 88);
        $this->assertEquals($applications[21]['hopes'], [4,3,2,5,1]);

        $this->assertEquals($applications[22]['id'], 52);
        $this->assertEquals($applications[22]['hopes'], [4,5,2,1,3]);

        $this->assertEquals($applications[23]['id'], 77);
        $this->assertEquals($applications[23]['hopes'], [3,2,1,5,4]);

        $this->assertEquals($applications[24]['id'], 59);
        $this->assertEquals($applications[24]['hopes'], [5,3,2,4,1]);
    }
}
