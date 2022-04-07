<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection
{
    public function headings():array{
        return [
          'ID',
          'Product Name',
          'Slug',
          'price'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Product::getProduct());
    }
}
