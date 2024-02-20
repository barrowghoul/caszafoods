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

class ItemsPurchaseDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $edit = "<a href='" . route('purchase-orders.edit', $query->id) . "' class='btn btn-primary'><i class='material-icons'>mode_edit</i></a>";
                return $edit;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PurchaseOrder $model): QueryBuilder
    {
        //return $model->newQuery();
        return $model->newQuery()
            ->join('purchase_order_details', function($join){
                $join->on('purchase_orders.id', '=', 'purchase_order_details.purchase_order_id');
            })
            ->join('items', function($join){
                $join->on('purchase_order_details.item_id', '=', 'items.id');
            })
            ->where('purchase_order_details.item_id', '=', $this->id)
            ->select('purchase_orders.id as id', 'items.name as item', 'purchase_order_details.quantity as quantity', 'purchase_orders.status as status');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('itemspurchase-table')
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
            Column::make('item'),
            Column::make('quantity'),
            Column::make('status'),
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
        return 'ItemsPurchase_' . date('YmdHis');
    }
}
