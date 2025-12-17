<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Category> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return $row->actions(false,true,true);
            })
            ->editColumn('category_id', function ($row) {
                return $row->category ? $row->category->name : 'N/A';
            })
            ->editColumn('status', function ($row) {
                return $row->status;
            })
            ->editColumn('parent_id', function ($row) {
                return $row->parent ? $row->parent->name : 'N/A';
            })
            ->editColumn('description',function($row){
                return $row->description ? $row->description : "N/A";
            })
            ->setRowId('id')
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Category>
     */
    public function query(Category $model)
    {
        $query = $model->newQuery()->with('parent');
        if ($this->status === 'parent') {
            $query->whereNull('parent_id');
        }

        if ($this->status === 'child') {
            $query->whereNotNull('parent_id');
        }
        return $query->select('*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('data-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->parameters([
                        'initComplete' => 'function () {
                            var table = this.api();
                            $("#custom-search").on("input", function() {
                                table.search(this.value).draw();
                            });
                        }',
                        'processing' => false,
                        'dom' =>
                        'Brt' .
                            '<"row d-flex justify-content-between align-items-center"
                                <"col-md-6 d-flex align-items-center"l>
                                <"col-md-6 d-flex justify-content-end"p>
                            >',
                        'footerCallback' => false,
                        'language' => [
                            'paginate' => [
                                'next' => '<i class="fa fa-angle-right"></i>',
                                'previous' => '<i class="fa fa-angle-left"></i>'
                            ]
                        ],
                    ])
                    ->responsive(true)
                    ->autoWidth(false)
                    ->setTableHeadClass('thead-light');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $columns = [
            Column::make('id'),
            Column::make('name')->title($this->status === 'child' ? 'Subcategory Name' : 'Category Name'),
            Column::make('description'),
            Column::make('status'),
        ];

        if ($this->status === 'child') {
            $columns[] = Column::make('parent_id')->title('Parent Category');
        }

        $columns[] = Column::make('action')->class("action-table-data text-center");

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
