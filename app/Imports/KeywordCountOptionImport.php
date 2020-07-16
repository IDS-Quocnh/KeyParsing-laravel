<?php

namespace App\Imports;

use App\KeywordCountOption;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KeywordCountOptionImport implements ToModel, WithHeadingRow
{
    public function headingRow() : int
    {
        return 1;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KeywordCountOption([
            'keyword'     => $row['keyword'],
            'exactMatch'    => $row['exact_match']
        ]);

    }
}
