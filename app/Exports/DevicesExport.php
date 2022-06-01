<?php

namespace App\Exports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DevicesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Device::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Inventory Number',
            'Comment',
            'Model',
            'Family',
            'Status',
            'Mark',
            'User',
            'Site',
            'Ubication',
            'Department',
            'Created At',
            'Updated At',
        ];
    }
}
