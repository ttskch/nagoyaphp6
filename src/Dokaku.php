<?php

namespace Nagoya\Dokaku;

class Dokaku
{
    private $parser;
    private $printer;
    private $booker;

    public function __construct(InputParser $parser, OutputPrinter $printer, Booker $booker)
    {
        $this->parser = $parser;
        $this->printer = $printer;
        $this->booker = $booker;
    }

    public function process($inputString)
    {
        $applications = $this->parser->parse($inputString);

        foreach ($applications as $application) {
            $this->booker->book($application);
        }

        $elected = $this->booker->elect();

        return $this->printer->dump($elected);
    }
}
