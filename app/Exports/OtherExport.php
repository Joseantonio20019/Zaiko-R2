<?php

namespace App\Exports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OtherExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Device::where('family','=',function($query){
            $query->select('name')
            ->from('families')
            ->where('device','=','OTHER');
        })->get();
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
