<?php

namespace App\DataTables;

use App\Models\SeoSetting;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SeoSettingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('og_enabled', function($query){
                return $query->og_enabled ? 'Yes' : 'No';
            })
            ->addColumn('twitter_enabled', function($query){
                return $query->twitter_enabled ? 'Yes' : 'No';
            })
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.seo-setting.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                <a href="'.route('admin.seo-setting.destroy', $query->id).'" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SeoSetting $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('seosetting-table')
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
            Column::make('page_slug')->title('Seo Page Slug'),
            Column::make('title')->title('Seo Title'),
            Column::make('og_enabled')->title('Open Graph (OG) Tags Enabled'),
            Column::make('twitter_enabled')->title('Twitter Card Enabled'),
            Column::make('canonical_url'),
            Column::make('robots'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SeoSetting_' . date('YmdHis');
    }
}
