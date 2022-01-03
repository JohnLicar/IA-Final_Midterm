<?php

namespace App\Charts;

use App\Models\Todo;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class CompletedChart
{
    protected $chart;
    protected $values = [0];
    protected $label = [];

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $datas =   Todo::select(
            DB::raw('COUNT(*) as "views"')
        )->where('user_id', auth()->id())
            ->groupBy('isDone')
            ->get();

        foreach ($datas as $index => $data) {

            $this->values[$index] = $data['views'];
        }

        return $this->chart->pieChart()
            ->setTitle('TODO Analytics')
            ->setHeight(300)
            ->addData($this->values)
            ->setLabels(['Completed', 'Pending']);
    }
}
