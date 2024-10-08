<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestsExport implements FromCollection, WithHeadings
{
    public function __construct(int $event_id)
    {
        $this->event_id = $event_id;
    }

    public function headings(): array
    {
        return ['Guest name', 'Address', 'Amount in KHR', 'Amount in USD', 'Payment method'];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Guest::where('event_id', $this->event_id)->get(['fullname', 'address', 'amount_kh', 'amount_usd', 'payment_method']);
    }
}
