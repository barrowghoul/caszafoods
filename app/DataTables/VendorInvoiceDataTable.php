<?php

namespace App\DataTables;

use App\Models\VendorInvoice;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorInvoiceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('vendor_name', function($query){
                return $query->vendor?->name;
            })
            ->addColumn('status', function($query){
                if($query->status == VendorInvoice::PENDIENTE){
                    return "<span class='label label-pill label-primary'>Pendiente</span>";
                }elseif($query->status == VendorInvoice::PAGADA){
                    return "<span class='label label-pill label-success'>Pagada</span>";
                }elseif($query->status == VendorInvoice::CANCELADA){
                    return "<span class='label label-pill label-warinig'>Cancelada</span>";
                }else{
                    return "<span class='label label-pill label-danger'>Vencida</span>";
                }
            })
            ->addColumn('action', function ($query){
                $edit = "<a href='" . route('vendor-invoices.edit', $query->id) . "' class='btn btn-primary'><i class='material-icons'>mode_edit</i></a>";
                $delete = "<a href='" . route('vendor-invoices.destroy', $query->id) . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro?\")'><i class='material-icons'>delete</i></a>";
                return $edit . $delete;

            })
            ->rawColumns(['vendor_name','action','status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(VendorInvoice $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorinvoice-table')
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
            Column::make('vendor_name'),
            Column::make('invoice'),
            Column::computed('status'),
            Column::make('pay_date'),
            Column::make('total'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorInvoice_' . date('YmdHis');
    }
}
