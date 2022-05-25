<?php

namespace App\Exports;

use App\Models\Printer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrinterExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Printer::join('devices','devices.id','=','printers.device_id')
        ->select(
            'printers.device_id','printers.ink','printers.USB','printers.COM','printers.WIFI','printers.Ethernet','devices.inventory_number','devices.comment'
            ,'devices.model','devices.family','devices.status','devices.mark','devices.site','devices.ubication','devices.department','devices.created_at'
        )->get();
    }

    public function headings(): array
    {
        return [

            'ID',
            'INK',
            'USB',
            'COM',
            'WIFI',
            'Ethernet',
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
