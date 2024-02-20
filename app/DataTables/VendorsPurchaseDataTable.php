<?php

namespace App\DataTables;

use App\Models\PurchaseOrder;
use App\Models\VendorsPurchase;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorsPurchaseDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        //$query = PurchaseOrder::where('vendor_id', $this->id)->orderBy('created_at', 'desc');

        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $edit = "<a href='" . route('purchase-orders.edit', $query->id) . "' class='btn btn-primary'><i class='material-icons'>visibility</i></a>";
                return $edit;

            })
            ->addColumn('updated_at', function($query){
                return $query->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'updated_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PurchaseOrder $model): QueryBuilder
    {
        return $model->newQuery()
                    ->where('vendor_id', $this->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorspurchase-table')
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
            Column::make('total'),
            Column::make('status'),
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
        return 'VendorsPurchase_' . date('YmdHis');
    }
}
