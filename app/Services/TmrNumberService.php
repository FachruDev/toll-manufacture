<?php

namespace App\Services;

use App\Models\TmrNumber;
use Illuminate\Support\Facades\DB;

class TmrNumberService
{
    public static function nextFormatted(?\DateTimeInterface $when = null): string
    {
        $when = $when ?: now();
        $year = (int) $when->format('Y');
        $month = (int) $when->format('n');

        $seq = DB::transaction(function () use ($year, $month) {
            $row = TmrNumber::lockForUpdate()->firstOrCreate([
                'year' => $year,
                'month' => $month,
            ], [
                'last_no' => 0,
            ]);
            $row->last_no++;
            $row->save();
            return $row->last_no;
        }, 3);

        $roman = self::romanMonth($month);
        $nnn = str_pad((string) $seq, 3, '0', STR_PAD_LEFT);
        return sprintf('%s/TMR/TM/GPL/%s/%s', $nnn, $roman, $year);
    }

    public static function romanMonth(int $month): string
    {
        $map = [1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',7=>'VII',8=>'VIII',9=>'IX',10=>'X',11=>'XI',12=>'XII'];
        return $map[$month] ?? '';
    }
}

