<?php

namespace App\DataTables;

use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PurchaseOrderDataTable extends DataTable
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
                $edit = "<a href='" . route('purchase-orders.edit', $query->id) . "' class='btn btn-primary'><i class='material-icons'>mode_edit</i></a>";
                return $edit;
            })
            ->addColumn('user_name', function ($query) {
                return $query->user->name;
            })
            ->addColumn('vendor_name', function ($query) {
                return $query->vendor->name;
            })
            ->addColumn('updated_at', function ($query) {
                return $query->updated_at->diffForHumans();
            })
            ->addColumn('status', function($query){
                if($query->status === PurchaseOrder::ABIERTA){
                    return "<span class='label label-pill label-primary'>Abierta</span>";
                }else if($query->status === PurchaseOrder::ENVIADA){
                    return "<span class='label label-pill label-warning'>En Proceso</span>";
                }else if($query->status == PurchaseOrder::CANCELADA){
                    return "<span class='label label-pill label-danger'>Cancelada</span>";
                }else{
                    return "<span class='label label-pill label-success'>En Proceso</span>";
                }
            })
            ->rawColumns(['action', 'user_name', 'vendor_name', 'updated_at', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PurchaseOrder $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('purchaseorder-table')
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
            Column::computed('user_name'),
            Column::computed('vendor_name'),
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
        return 'PurchaseOrder_' . date('YmdHis');
    }
}
