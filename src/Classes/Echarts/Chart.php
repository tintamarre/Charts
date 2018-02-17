<?php

namespace ConsoleTVs\Charts\Classes\Echarts;

use Illuminate\Support\Collection;
use ConsoleTVs\Charts\Classes\BaseChart;
use ConsoleTVs\Charts\Features\Echarts\Chart as ChartFeatures;

class Chart extends BaseChart
{
    use ChartFeatures;

    /**
     * Chartjs dataset class.
     *
     * @var object
     */
    public $dataset = Dataset::class;

    /**
     * Initiates the Chartjs Line Chart.
     *
     * @return Self
     */
    public function __construct()
    {
        parent::__construct();

        $this->container = 'charts::echarts.container';
        $this->script = 'charts::echarts.script';

        return $this->options([
            'legend' => [
                'show' => true
            ],
            'tooltip' => [
                'show' => true
            ]
        ]);
    }

    /**
     * Formats the labels.
     *
     * @return Self
     */
    public function formatOptions(bool $strict = false, bool $noBraces = false)
    {
        $this->options([
            'xAxis' => [
                'show' => true,
                'data' => json_decode($this->formatLabels())
            ],
            'yAxis' => [
                'show' => true
            ],
        ]);

        return parent::formatOptions($strict, $noBraces);
    }
}