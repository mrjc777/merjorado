<?php

namespace App;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportModel implements ToCollection, WithHeadingRow {
    public function collection(Collection $rows) {
    }
}
