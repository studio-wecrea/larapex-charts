<?php


namespace ArielMejiaDev\LarapexCharts\Traits;


use ArielMejiaDev\LarapexCharts\LarapexChart;

trait SimpleChartDataAggregator
{
    public function addData(array $data) :self
    {
        $this->dataset = $data;

        $this->dataset = json_encode($this->dataset);

        return $this;
    }

    public function addDataDashed(string $name, array $data, string $type) :self
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