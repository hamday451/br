<?php

namespace App\DataTables;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WishlistDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->editColumn('customer_id', function (Wishlist $wishlist) {
            return isset($wishlist->UserData) ? ($wishlist->UserData->first_name .' '. $wishlist->UserData->last_name) : null;
        })
        ->editColumn('email', function (Wishlist $wishlist) {
            return isset($wishlist->UserData) ? $wishlist->UserData->email : '';
        })
        ->addColumn('product', function (Wishlist $wishlist) {
            $wishlist_count = Wishlist::where('customer_id',$wishlist->customer_id)->where('store_id', getCurrentStore())->where('theme_id', APP_THEME())->count();
            return view('wishlist.product', compact('wishlist','wishlist_count'));
        })
        ->addColumn('action', function (Wishlist $wishlist) {
            return view('wishlist.action', compact('wishlist'));
        })
        ->filterColumn('customer_id', function ($query, $keyword) {
            // Assuming `permissions` is a relationship, adjust as needed
            $query->whereHas('UserData', function ($subQuery) use ($keyword) {
                $subQuery->where('first_name', 'like', "%$keyword%")->orWhere('last_name', 'like', "%$keyword%");
            });
        })
        ->filterColumn('email', function ($query, $keyword) {
            // Assuming `permissions` is a relationship, adjust as needed
            $query->whereHas('UserData', function ($subQuery) use ($keyword) {
                $subQuery->where('email', 'like', "%$keyword%");
            });
        })
        ->orderColumn('customer_id', function ($query, $direction) {
            // Assuming `permissions` is a relationship, adjust as needed
            $query->whereHas('UserData', function ($subQuery) use ($direction) {
                $subQuery->orderBy('first_name', $direction)->orderBy('last_name', $direction);
            });
        })
        ->orderColumn('email', function ($query, $direction) {
            // Assuming `permissions` is a relationship, adjust as needed
            $query->whereHas('UserData', function ($subQuery) use ($direction) {
                $subQuery->orderBy('email', $direction);
            });
        })
        ->rawColumns(['customer_id','email','product','action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Wishlist $model): QueryBuilder
    {
        return $model->newQuery()->with('UserData')->where('theme_id', APP_THEME())->where('store_id', getCurrentStore())->groupBy('customer_id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        $dataTable = $this->builder()
            ->setTableId('wishlist-table')
            ->columns(array_merge(array_slice($this->getColumns(), 0, 1),bulkDeleteCloneCheckboxColumn(),array_slice($this->getColumns(), 1)))
            ->minifiedAjax()
            ->orderBy(0)
            ->language([
                "paginate" => [
                    "next" => '<i class="ti ti-chevron-right"></i>',
                    "previous" => '<i class="ti ti-chevron-left"></i>'
                ],
                'lengthMenu' => "_MENU_" . __('Entries Per Page'),
                "searchPlaceholder" => __('Search...'),
                "search" => "",
                "info" => __("Showing")." _START_ ".__("to"). " _END_ ".__("of")." _TOTAL_ ".__("entries")
            ])
            ->initComplete('function() {
                        var table = this;

                        var searchInput = $(\'#\'+table.api().table().container().id+\' label input[type="search"]\');
                        searchInput.removeClass(\'form-control form-control-sm\');
                        searchInput.addClass(\'dataTable-input\');
                        var select = $(table.api().table().container()).find(".dataTables_length select").removeClass(\'custom-select custom-select-sm form-control form-control-sm\').addClass(\'dataTable-selector\');
                    }');

        $exportButtonConfig = [];
        // $exportButtonConfig = [
        //     'extend' => 'collection',
        //     'className' => 'btn btn-light-secondary me-1 dropdown-toggle',
        //     'text' => '<i class="ti ti-download"></i> ' . __('Export'),
        //     'buttons' => [
        //         [
        //             'extend' => 'print',
        //             'text' => '<i class="fas fa-print"></i> ' . __('Print'),
        //             'className' => 'btn btn-light text-primary dropdown-item',
        //             'exportOptions' => ['columns' => [0, 1, 3]],
        //         ],
        //     ],
        // ];


        $bulkdeleteButtonConfig = [];
        if (module_is_active('BulkDelete')) {
            $bulkdeleteButtonConfig = bulkDeleteForm('wishlist','wishlist-table');
        }

        $buttonsConfig = array_merge([
            $exportButtonConfig,
            $bulkdeleteButtonConfig,
            [
                'text' => '<i class="ti ti-arrow-back-up" data-bs-toggle="tooltip" title="'.__("Reset").'" data-bs-original-title="'.__("Reset").'"></i>',
                'extend' => 'reset',
                'className' => 'btn btn-light-info',
            ],
            [
                'text' => '<i class="ti ti-refresh" data-bs-toggle="tooltip" title="'.__("Reload").'" data-bs-original-title="'.__("Reload").'"></i>',
                'extend' => 'reload',
                'className' => 'btn btn-light-warning',
            ],
        ]);

        $dataTable->parameters([
            "dom" =>  "
        <'dataTable-top'<'dataTable-dropdown page-dropdown'l><'dataTable-botton table-btn dataTable-search tb-search  d-flex justify-content-end gap-1'Bf>>
        <'dataTable-container'<'col-sm-12'tr>>
        <'dataTable-bottom row'<'col-5'i><'col-7'p>>",
            'buttons' => $buttonsConfig,
            "drawCallback" => 'function( settings ) {
                var tooltipTriggerList = [].slice.call(
                    document.querySelectorAll("[data-bs-toggle=tooltip]")
                  );
                  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                  });
                  var popoverTriggerList = [].slice.call(
                    document.querySelectorAll("[data-bs-toggle=popover]")
                  );
                  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                    return new bootstrap.Popover(popoverTriggerEl);
                  });
                  var toastElList = [].slice.call(document.querySelectorAll(".toast"));
                  var toastList = toastElList.map(function (toastEl) {
                    return new bootstrap.Toast(toastEl);
                  });
            }'
        ]);

        $dataTable->language([
            'buttons' => [
                'create' => __('Create'),
                'print' => __('Print'),
                'reset' => __('Reset'),
                'reload' => __('Reload'),
            ]
        ]);

        return $dataTable;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->searchable(false)->visible(false)->exportable(false)->printable(false),
            Column::make('customer_id')->title(__('Customer'))->addClass('text-capitalize'),
            Column::make('email')->title(__('Email')),
            Column::computed('product')->title(__('Product'))->searchable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')->title(__('Action')),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Wishlist_' . date('YmdHis');
    }
}
