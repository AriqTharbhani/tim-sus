<?php

// app/Charts/StudentChart.php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class StudentChart extends LarapexChart
{
    public function __construct()
    {
        parent::__construct();

        $siswa = DB::table('siswa')
            ->select(DB::raw('COUNT(*) as count'), 'jenis_kelamin')
            ->groupBy('jenis_kelamin')
            ->get();

        $counts = [0, 0];
        foreach ($siswa as $data) {
            if ($data->jenis_kelamin === 'L') {
                $counts[0] = $data->count;
            } elseif ($data->jenis_kelamin === 'P') {
                $counts[1] = $data->count;
            }
        }

        $this->barChart()
            ->setTitle('Jumlah Siswa Berdasarkan Jenis Kelamin')
            ->setSubtitle('Season 2023')
            ->addData('Siswa', $counts)
            ->setXAxis(['Laki-Laki', 'Perempuan']);
    }
}