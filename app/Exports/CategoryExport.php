<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection
{
    public function headings():array{
        return [
          'ID',
          'Category Name',
          'Slug'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Category::getCategory());
    }
}
