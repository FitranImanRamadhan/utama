<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAbsensi implements FromCollection
{
    protected $absensiData;

    public function __construct($absensiData)
    {
        $this->absensiData = $absensiData;
    }

    public function collection()
    {
        return $this->absensiData;
    }
}

