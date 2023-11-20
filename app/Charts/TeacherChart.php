<?php

// app/Charts/TeacherChart.php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class TeacherChart extends LarapexChart
{
    public function __construct()
    {
        parent::__construct();

        $teachers = DB::table('guru')
            ->select(DB::raw('COUNT(*) as count'), 'jenis_kelamin')
            ->groupBy('jenis_kelamin')
            ->get();

        $counts = [0, 0]; // Initialize counts for both genders

        foreach ($teachers as $data) {
            if ($data->jenis_kelamin === 'L') {
                $counts[0] = $data->count;
            } elseif ($data->jenis_kelamin === 'P') {
                $counts[1] = $data->count;
            }
        }

        $this->barChart()
            ->setTitle('Jumlah Guru Berdasarkan Jenis Kelamin')
            ->setSubtitle('Season 2023')
            ->addData('Guru', $counts)
            ->setXAxis(['Laki-Laki', 'Perempuan']);
    }
}