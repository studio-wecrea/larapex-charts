<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait ComplexChartDataAggregator
{
    public function addData(string $name, array $data,string $type) 
    {
        $this->dataset = json_decode($this->dataset);

        $this->dataset[] = [
            'name' => $name,
            'data' => $data,
            'type' => $type,
        ];

        $this->dataset = json_encode($this->dataset);

        return $this;
    }

    public function addDataDashed(string $name, array $data,string $type) 
    {
        $this->dataset = json_decode($this->dataset);

        $this->dataset[] = [
            'name' => $name,
            'data' => $data,
            'type' => $type,
        ];

        $this->dataset = json_encode($this->dataset);

        $this->dashed = true;
        return $this;
    }
}