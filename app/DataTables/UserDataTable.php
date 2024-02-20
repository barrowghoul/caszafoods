<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
                $edit = "<a href='".route('users.edit', $query->id)."' class='btn btn-primary'><i class='material-icons'>mode_edit</i></a>";
                $delete = "<a href='".route('users.delete', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='material-icons'>do_not_disturb</i></a>";

                return $edit . " " . $delete;
            })
            ->addColumn('status', function($query){
                if($query->status === 1){
                    return "<span class='label label-pill label-success'>Activo</span>";
                }else{
                    return "<span class='label label-pill label-danger'>Suspendido</span>";
                }
            })
            ->addColumn('updated_at', function($query){
                return $query->updated_at->diffForHumans();
            })
            ->addColumn('role', function($query){
                return $query->getRoleNames()->first();
            })
            ->rawColumns(['action','status','updated_at','Role'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
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
            Column::make('id')->width(60),
            Column::make('name')->width(200),
            Column::computed('role'),
            Column::computed('status'),
            Column::computed('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
