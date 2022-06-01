<?php

namespace App\Exports;

use App\Models\Monitor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonitorExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Monitor::join('devices','devices.id','=','monitors.device_id')
        ->select(
            'monitors.device_id','monitors.inches','monitors.HDMI','monitors.VGA','monitors.DVI','monitors.DisplayPort',
            'devices.inventory_number','devices.comment','devices.model','devices.family','devices.status','devices.mark','devices.user','devices.site','devices.ubication','devices.department','devices.created_at'
        )
        ->get();
    }

    public function headings(): array
    {
        return [

            'ID',
            'Inches',
            'HDMI',
            'VGA',
            'DVI',
            'DisplayPort',
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
