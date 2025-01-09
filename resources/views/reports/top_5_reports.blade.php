@extends('layouts.app')

@section('page-title')
    {{ __('Top Sales Report') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">{{ __('Top Sales Report') }}</li>
@endsection

@section('action-button')
    <div class="text-end">
        <a href="#" class="btn btn-sm btn-primary btn-icon" onclick="saveAsPDF()"  data-bs-toggle="tooltip"  data-bs-original-title="{{ __('Download') }}">
            <i class="ti ti-download"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="row" id="printableArea">
        <!-- Card 1 with Chart -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 m-0">
                <div class="card-header">
                    <h5 class="card-title"><b>{{ __('Top Selling Products') }}</b></h5>
                </div>
                <div class="card-body" style="overflow-x: overlay;">
                    <div id="topSellingProductsChart"></div>
                </div>
            </div>
        </div>

        <!-- Empty Card 2 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 m-0">
                <div class="card-header">
                    <h5 class="card-title"><b>{{ __('Top Selling Category') }}</b></h5>
                </div>
                <div class="card-body" style="overflow-x: overlay;">
                    <div id="topSellingsecondProductsChart"></div>
                </div>
            </div>
        </div>

        <!-- Empty Card 3 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 m-0">
                <div class="card-header">
                    <h5 class="card-title"><b>{{ __('Top Selling Brand') }}</b></h5>
                </div>
                <div class="card-body" style="overflow-x: overlay;">

                    <div id="topSellingBrandChart"></div>
                </div>
            </div>
        </div>

        <!-- Empty Card 4 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 m-0">
                <div class="card-header">
                    <h5 class="card-title"><b>{{ __('Top Payment Method') }}</b></h5>
                </div>
                <div class="card-body" style="overflow-x: overlay;">
                    <div id="paymentMethodsChart"></div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-script')
        <script src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
        <script>
            // var filename = $('#filename').val();
            function saveAsPDF() {
                var element = document.getElementById('printableArea');
                var opt = {
                    margin: 0.3,
                    filename: "Top Sales Report",
                    image: {type: 'jpeg', quality: 1},
                    html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                    jsPDF: {unit: 'in', format: 'A2'}
                };
                html2pdf().set(opt).from(element).save();
            }
        </script>
       <script>
            // Prepare your dynamic data
            var productCounts = @json($productCounts);
            var productNames = @json($productNames);

            // Check if data is empty
            var hasData = productCounts.length > 0;

            var options = {
                series: hasData ? productCounts : [],
                chart: {
                    width: '100%',  // Make chart responsive within the container
                    height: '300px',  // Set a fixed height for consistency
                    type: 'pie',
                },
                labels: hasData ? productNames : [],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%',  // Make chart responsive within the container
                            height: '300px',  // Set a fixed height for consistency
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                noData: {
                    text: "@lang('No Data Found')",
                    align: 'center',
                    verticalAlign: 'middle',
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        color: '#000',
                        fontSize: '14px',
                        fontFamily: undefined
                    }
                }
            };

            var topSellingProductsChart = new ApexCharts(document.querySelector("#topSellingProductsChart"), options);
            topSellingProductsChart.render();
        </script>

        <script>
            // Prepare your dynamic data
            var saleCounts = @json($top_sales->pluck('total_sale'));
            var saleNames =  @json($top_sales->pluck('sale_name'));

            // Check if data is empty
            var hasSaleData = saleCounts.length > 0;
            var options = {
                series: hasSaleData ? saleCounts : [],
                chart: {
                    width: '100%',  // Make chart responsive within the container
                    height: '300px',  // Set a fixed height for consistency
                    type: 'pie',
                },
                labels: hasSaleData ? saleNames : [],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%',  // Make chart responsive within the container
                            height: '300px',  // Set a fixed height for consistency
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                noData: {
                    text: "@lang('No Data Found')",
                    align: 'center',
                    verticalAlign: 'middle',
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        color: '#000',
                        fontSize: '14px',
                        fontFamily: undefined
                    }
                }
            };

            var topSellingsecondProductsChart = new ApexCharts(document.querySelector("#topSellingsecondProductsChart"), options);
            topSellingsecondProductsChart.render();
        </script>

        <script>
            // Prepare your dynamic data
            var sellingCounts = @json($top_brand_sales->pluck('total_sale'));
            var sellingNames =  @json($top_brand_sales->pluck('sale_name'));

            // Check if data is empty
            var hasSellingData = sellingCounts.length > 0;
            var options = {
                series: hasSellingData ? sellingCounts : [],
                chart: {
                    width: '100%',  // Make chart responsive within the container
                    height: '300px',  // Set a fixed height for consistency
                    type: 'pie',
                },
                labels: hasSellingData ? sellingNames : [],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%',  // Make chart responsive within the container
                            height: '300px',  // Set a fixed height for consistency
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                noData: {
                    text: "@lang('No Data Found')",
                    align: 'center',
                    verticalAlign: 'middle',
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        color: '#000',
                        fontSize: '14px',
                        fontFamily: undefined
                    }
                }
            };

            var topSellingBrandChart = new ApexCharts(document.querySelector("#topSellingBrandChart"), options);
            topSellingBrandChart.render();
        </script>

        <script>
            // Prepare your dynamic data
            var paymentCounts = @json($paymentMethods->values());
            var paymentNames =  @json($paymentMethods->keys());

            // Check if data is empty
            var hasPaymentData = paymentCounts.length > 0;
            var options = {
                series: hasPaymentData ? paymentCounts : [],
                chart: {
                    width: '100%',  // Make chart responsive within the container
                    height: '300px',  // Set a fixed height for consistency
                    type: 'pie',
                },
                labels: hasPaymentData ? paymentNames : [],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%',  // Make chart responsive within the container
                            height: '300px',  // Set a fixed height for consistency
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                noData: {
                    text: "@lang('No Data Found')",
                    align: 'center',
                    verticalAlign: 'middle',
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        color: '#000',
                        fontSize: '14px',
                        fontFamily: undefined
                    }
                }
            };

            var paymentMethodsChart = new ApexCharts(document.querySelector("#paymentMethodsChart"), options);
            paymentMethodsChart.render();
        </script>

    @endpush
@endsection
