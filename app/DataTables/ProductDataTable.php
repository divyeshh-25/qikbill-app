<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('category', function ($row) {
                return $row->category?->name ?? '<span class="text-muted">No Category</span>';
            })
            ->addColumn('status', function ($row) {
                return $row->statusBadge;
            })
            ->addColumn('action', function ($row) {
                return $row->action;
            })
            ->rawColumns(['status', 'action', 'category']);
    }

    public function query(Product $model)
    {
        return $model->newQuery()
            ->with(['category'])
            ->orderBy('id', 'desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('products-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->language([
                'paginate' => [
                    'previous' => '<i class="fa fa-angle-left"></i>',
                    'next' => '<i class=" fa fa-angle-right"></i>',
                ],
            ])
            ->responsive(true)
            ->autoWidth(false);
    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderable(false)->width(40),
            Column::make('sku')->title('SKU'),
            Column::make('name')->title('Name'),
            Column::make('category')->title('Category'),
            Column::make('price')->title('Price'),
            Column::make('cost_price')->title('Cost Price'),
            Column::make('stock_quantity')->title('Stock'),
            Column::make('status')->title('Status'),
            Column::make('action')->class("action-table-data text-center"),
        ];
    }

    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}
