<?php
/**
 * This file is part of the Nagoya.Dokaku
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Nagoya\Dokaku;

class Dokaku
{
    private $parser;
    private $assignor;
    private $applications;

    public function __construct(InputParser $parser, Assignor $assignor)
    {
        $this->parser = $parser;
        $this->assignor = $assignor;
    }

    public function input($inputString)
    {
        $this->applications = $this->parser->parse($inputString);
    }

    public function process()
    {
        return $this->assignor->assign($this->applications);
    }
}
