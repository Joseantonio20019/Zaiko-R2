<?php

namespace App\Exports;

use App\Models\Computer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComputerExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Computer::join('devices','devices.id','=','computers.device_id')
        ->join('hard_drives','hard_drives.pc_id','=','computers.device_id')
        ->select(
            'computers.device_id','computers.cpu','computers.cpu_model','computers.ram_type','computers.ram_size','computers.os',
            'devices.inventory_number','devices.comment','devices.model','devices.family','devices.status','devices.mark','devices.user','devices.site','devices.ubication','devices.department','devices.created_at',
            'hard_drives.type'
        )->get();
    }


    public function headings(): array
    {

        return [

            'ID',
            'CPU',
            'CPU Model',
            'RAM Type',
            'RAM Size',
            'OS',
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
            'Hard Drive Size',
        ];
    }
}
