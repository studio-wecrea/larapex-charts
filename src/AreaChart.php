<?php

namespace ArielMejiaDev\LarapexCharts;

use ArielMejiaDev\LarapexCharts\Contracts\MustAddComplexData;
use ArielMejiaDev\LarapexCharts\Traits\ComplexChartDataAggregator;

class AreaChart extends LarapexChart implements MustAddComplexData
{
    use ComplexChartDataAggregator;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'area';
    }

    public function addArea(string $name, array $data,string $type) :AreaChart
    {
        return $this->addData($name, $data,$type);
    }

    public function addAreaDashed(string $name, array $data,string $type) :AreaChart
    {
        return $this->addDataDashed($name, $data,$type);
    }
}