<?php

namespace ConsoleTVs\Charts\Features\Highcharts;

trait Chart
{
    /**
     * Display the chart axes.
     *
     * @param  bool   $axes
     * @return Self
     */
    public function displayAxes(bool $axes)
    {
        return $this->options([
            'xAxis' => [
                'visible' => $axes
            ],
            'yAxis' => [
                'visible' => $axes
            ]
        ]);
    }

    /**
     * Display the legend.
     *
     * @param  bool   $legend
     * @return Self
     */
    public function displayLegend(bool $legend)
    {
        return $this->options([
            'legend' => [
                'enabled' => $legend
            ]
        ]);
    }

    /**
     * Set the chart style to minimalist.
     *
     * @param  boolean $display
     * @return Self
     */
    public function minimalist(bool $display = false)
    {
        $this->displayLegend(!$display);

        return $this->displayAxes(!$display);
    }

    /**
     * Set the highcharts yAxis label.
     *
     * @param  string $label
     * @return Self
     */
    public function label(string $label)
    {
        return $this->options([
            'yAxis' => [
                'title' => [
                    'text' => $label
                ]
            ]
        ]);
    }

    /**
     * Set the chart title.
     *
     * @param  string $title
     * @return Self
     */
    public function title(string $title)
    {
        return $this->options([
            'title' => [
                'text' => $title,
            ]
        ]);
    }

    /**
     * Shapes the pie chart into a doughnut.
     *
     * @return Self
     */
    public function doughnut(int $size = 50)
    {
        return $this->options([
            'plotOptions' => [
                'pie' => [
                    'innerSize' => "{$size}%",
                ]
            ]
        ]);
    }
}