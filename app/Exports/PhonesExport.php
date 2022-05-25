<?php

namespace App\Exports;

use App\Models\Phone;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PhonesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Phone::join('devices','devices.id','=','phones.device_id')
        ->select(
            'phones.device_id','phones.extension','phones.serial_number','phones.imei','devices.inventory_number','devices.comment','devices.model',
            'devices.family','devices.status','devices.mark','devices.site','devices.ubication','devices.department','devices.created_at')
        ->get();
    }

    public function headings(): array
    {
        return [

            'ID',
            'Extension',
            'Serial Number',
            'IMEI',
            'Inventory Number',
            'Comment',
            'Model',
            'Type',
            'Family',
            'Status',
            'Mark',
            'created At',
            'updated At',

        ];
    }
}
