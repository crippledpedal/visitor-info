<?php

namespace Mezbilisim\VisitorInfo\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitorsExport implements FromCollection, WithMapping, WithHeadings
{
    public $downloadVisitors;

    public function __construct($downloadVisitors)
    {
        $this->downloadVisitors = $downloadVisitors;
    }

    public function headings():array
    {
        return [
            'IP', 'Ülke', 'Şehir', 'URL', 'Referer', 'Tarih'
        ];
    }

    public function map($visitor): array
    {
        return [
            [
                $visitor->ip,
                $visitor->county,
                $visitor->city,
                $visitor->url,
                $visitor->referer,
                Carbon::parse($visitor->created_at)->isoFormat('DD MMMM YYYY, HH:mm')
            ]
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->downloadVisitors;
    }
}
