<?php

namespace App\Exports;

use App\Models\NetworkDevice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NDExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NetworkDevice::join('devices','devices.id','=','network_devices.device_id')
        ->select(
            'network_devices.device_id','network_devices.manageable','network_devices.POE','network_devices.Speed','network_devices.ethernet_ports_number','network_devices.fiber_ports_number',
            'devices.inventory_number','devices.comment','devices.model','devices.family','devices.status','devices.mark','devices.user','devices.site','devices.ubication','devices.department','devices.created_at'

        )->get();
 
    }

    public function headings(): array
    {
        return [

            'ID',
            'Manageable',
            'POE',
            'Speed',
            'Ethernet Ports',
            'Fiber Ports',
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
            'Created At'
        ];
    }
}
