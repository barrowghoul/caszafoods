<?php

namespace App\DataTables;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NotificationDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $query =  Notification::where('notifiable_id', Auth::user()->id)->orderBy('created_at', 'desc');

        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $edit = "<a href='" . route('notifications.read', $query->id) . "' class='btn btn-primary'><i class='material-icons'>done_all</i></a>";
                $delete = "<a href='" . route('notifications.delete', $query->id) . "' class='btn btn-danger'><i class='material-icons delete-item'>delete_forever</i></a>";
                return $edit . " " . $delete;
            })
            ->addColumn('title', function($query){
                return $query->data['title'];
            })
            ->addColumn('message', function($query){
                return $query->data['message'];
            })
            ->addColumn('status', function($query){
                if($query->read_at === null){
                    return "<span class='label label-pill label-danger'>Sin leer</span>";
                }else{
                    return "<span class='label label-pill label-success'>Leído</span>";
                }
            })
            ->addColumn('created_at', function($query){
                return $query->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'title', 'message', 'status', 'created_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Notification $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('notification-table')
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
            Column::computed('title'),
            Column::make('message'),
            Column::computed('status'),
            Column::computed('created_at'),
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
        return 'Notification_' . date('YmdHis');
    }
}
