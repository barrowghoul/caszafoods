<?php

namespace App\DataTables;

use App\Models\Reception;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReceptionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $edit = "<a href='" . route('receptions.edit', $query->id) . "' class='btn btn-primary'><i class='material-icons'>mode_edit</i></a>";
                return $edit;
            })
            ->addColumn('status', function ($query) {
                if ($query->status === Reception::ABIERTA) {
                    return "<span class='label label-pill label-primary'>Abierta</span>";
                } else if ($query->status === Reception::PENDIENTE) {
                    return "<span class='label label-pill label-warning'>En Proceso</span>";
                } else if ($query->status === Reception::CANCELADA) {
                    return "<span class='label label-pill label-danger'>Cancelada</span>";
                } else {
                    return "<span class='label label-pill label-success'>En Proceso</span>";
                }
            })
            ->addColumn('updated_at', function ($query) {
                return $query->updated_at->diffForHumans();
            })
            ->addColumn('user', function ($query) {
                return $query->user->name;
            })
            ->addColumn('vendor', function ($query) {
                if($query->vendor_id === null){
                    return "N/A";
                }else{
                    return $query->vendor->name;
                }
            })
            ->rawColumns(['action', 'status', 'updated_at', 'user', 'vendor'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Reception $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('reception-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::computed('user'),
            Column::computed('vendor'),
            Column::computed('status'),
            Column::computed('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Reception_' . date('YmdHis');
    }
}
