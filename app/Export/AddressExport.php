<?php

namespace App\Export;

use App\Model\AddressBook;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class AddressExport implements FromCollection
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AddressBook::all();
    }
}