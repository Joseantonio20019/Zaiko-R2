<?php

namespace App\Exports;

use App\Models\Pda;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PdaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pda::join('devices','devices.id','=','pdas.device_id')
        ->select(
            'pdas.device_id','pdas.MAC','pdas.serial_number','pdas.imei','devices.inventory_number','devices.comment','devices.model',
            'devices.family','devices.status','devices.mark','devices.site','devices.ubication','devices.department','devices.created_at')
        ->get();
    }

    public function headings(): array
    {
        return [

            'ID',
            'MAC Address',
            'Serial Number',
            'IMEI',
            'Inventory Number',
            'Comment',
            'Model',
            'Family',
            'Status',
            'Mark',
            'Site',
            'Ubication',
            'Department',
            'Created At',
            'Updated At',
        ];
    }
}
