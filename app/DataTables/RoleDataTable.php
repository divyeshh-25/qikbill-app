<?php

namespace App\DataTables;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Role> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return $row->actions(false, true, true, true);
            })
            ->addColumn('checkbox', function ($row) {
                return '<label class="checkboxs">
                            <input type="checkbox" class="user-checkbox" data-id="' . $row->id . '">
                            <span class="checkmarks"></span>
                        </label>';
            })
            ->editColumn('status', function ($row) {
                return $row->status;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('j F Y, g:i A');
            })
            ->setRowId('id')
            ->rawColumns(['action', 'checkbox', 'status']);
    }
    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Role>
     */
    public function query(Role $model): QueryBuilder
    {
        return $model->newQuery();
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
            ->orderBy(3,'desc')
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
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])
            ->autoWidth(false)
            ->setTableHeadClass('thead-light');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('checkbox')
                ->title('<label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>')
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->width(30),
            Column::make('name'),
            Column::make('status'),
            Column::make('created_at'),
            Column::computed('action')
                ->orderable(false)
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->title('')
                ->addClass('text-center action-table-data')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Role_' . date('YmdHis');
    }
}
