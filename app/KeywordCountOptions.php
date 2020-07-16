<?php

namespace App;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KeywordCountOptions implements OnEachRow, WithHeadingRow
{
    public function headingRow() : int
    {
        return 1;
    }

    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        KeywordCountOption()->create([
            'keyword' => $row[0],
        ]);
    }

}
