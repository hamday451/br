<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Customer Reports')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item" aria-current="page"><?php echo e(__('Customer Reports')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="text-end">
        <a href="javascript:;" class="btn btn-sm btn-primary btn-icon exportChartButton" title="<?php echo e(__('Export')); ?>"
            data-bs-toggle="tooltip" data-bs-placement="top">
            <i class="ti ti-file-export"></i>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card card-body">
                <ul class="nav nav-pills gap-2 gap-3" id="pills-tab" role="tablist">
                    <li class="nav-item mb-2">
                        <button class="nav-link  chart-data active" name="chart_data" value="year"><?php echo e(__('Year')); ?></button>
                    </li>
                    <li class="nav-item mb-2">
                        <button class="nav-link chart-data" name="chart_data" value="last-month"><?php echo e(__('Last month')); ?></button>
                    </li>
                    <li class="nav-item mb-2">
                        <button class="nav-link chart-data" name="chart_data" value="this-month"><?php echo e(__('This month')); ?></button>
                    </li>
                    <li class="nav-item mb-2">
                        <button class="nav-link chart-data" name="chart_data" value="seven-day"><?php echo e(__('Last 7 days')); ?></button>
                    </li>
                    <div class="nav-item mb-2">
                        <?php echo e(Form::date('date', isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'), ['class' => 'date month-btn form-control', 'id' => 'pc-daterangepicker-1', 'placeholder' => 'YYYY-MM-DD'])); ?>



                    </div>
                    <div class="col-md-2 " id="filter_type" style="padding-left :10px;">
                        <button
                            class="btn btn-primary label-margin chart-data generate_button"><?php echo e(__('Generate')); ?></button>
                    </div>
                    <div id="deals-staff-report" height="400" style="" width="1100" data-color="primary"
                        data-height="280">
                    </div>
                </ul>
            </div>
        </div>
        <div class="chart_data pc-dt-export">

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-script'); ?>
    <script>
        $(document).ready(function() {
            function fetchData(value, date) {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "GET",
                    url: '<?php echo e(route('reports.chart')); ?>',
                    async: true,
                    data: {
                        _token: csrfToken,
                        chart_data: value,
                        Date: date,
                    },
                    success: function(data) {
                        $('#loader').fadeOut();
                        $('.chart_data').html(data.html);
                        (function() {
                            var chartBarOptions = {
                                series: [{
                                    name: '<?php echo e(__('Customer')); ?>',
                                    data: data.userTotal,

                                }, {
                                    name: "<?php echo e(__('Guest')); ?>",
                                    data: data.guestTotal
                                }, ],

                                chart: {
                                    height: 300,
                                    type: 'bar',
                                    stacked: true,

                                    // type: 'line',
                                    dropShadow: {
                                        enabled: true,
                                        color: '#000',
                                        top: 18,
                                        left: 7,
                                        blur: 10,
                                        opacity: 0.2
                                    },
                                    toolbar: {
                                        show: false
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                title: {
                                    text: '',
                                    align: 'left'
                                },
                                xaxis: {
                                    categories: data.monthList,
                                    title: {
                                        text: '<?php echo e(__('Months')); ?>'
                                    }
                                },
                                colors: ['#6FD943BF', '#F4B41ABF'],


                                grid: {
                                    strokeDashArray: 4,
                                },
                                legend: {
                                    show: false,
                                },
                                yaxis: {


                                }

                            };
                            var arChart = new ApexCharts(document.querySelector(".myChart"),
                                chartBarOptions);
                            arChart.render();
                        })();
                        var options = {
                            series: [data.customer, data.guest],
                            chart: {
                                width: 380,
                                type: 'donut',
                            },
                            colors: ['#6FD943', '#F4B41A'],
                            labels: ['Customer', 'Guest'],
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 260
                                    },
                                    legend: {
                                        position: 'bottom'

                                    }
                                }
                            }]
                        };
                        var chart = new ApexCharts(document.querySelector(".chart"), options);
                        chart.render();
                        (function() {
                            var options = {
                                chart: {
                                    height: 300,
                                    type: 'area',
                                    toolbar: {
                                        show: false,
                                    },
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    width: 2,
                                    curve: 'smooth'
                                },
                                series: [{
                                    name: 'Customer',
                                    data: data.registerTotal
                                }, {
                                    name: ' Guest',
                                    data: data.newguestTotal
                                }],
                                xaxis: {
                                    categories: data.monthList,
                                    title: {
                                        text: '<?php echo e(__('Days')); ?>'
                                    }
                                },
                                colors: ['#75DA48', '#F4B41A'],

                                grid: {
                                    strokeDashArray: 4,
                                },
                                legend: {
                                    show: false,
                                },
                                yaxis: {
                                    tickAmount: 3,
                                    title: {},
                                }
                            };
                            var chart = new ApexCharts(document.querySelector(".traffic-chart"),
                                options);
                            chart.render();
                        })();
                    },
                    error: function(error) {
                        $('#loader').fadeOut();
                    }
                });
            }

            $(".chart-data").on("click", function() {
                $(".chart-data").removeClass("active");
                $(this).addClass("active");
                var value = $(this).val();
                var date = $('.date').val();

                fetchData(value, date);
            });

            var firstValue = $(".chart-data:first").val();
            $(".chart-data:first").addClass("active");
            fetchData(firstValue);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.exportChartButton').click(function() {
                $.ajax({
                    url: '<?php echo e(route('reports.export')); ?>',
                    method: 'GET',
                    success: function(data) {
                        $('#loader').fadeOut();
                        if (data.hasOwnProperty("monthList") && data.hasOwnProperty(
                            "userTotal") && data.hasOwnProperty("registerTotal") && data
                            .hasOwnProperty("guest") && data.hasOwnProperty("newguestTotal")) {
                            var csvContent =
                                "data:text/csv;charset=utf-8,Duration,Customer orders,Guest orders ,Signups Customer , Guest \n";
                            for (var i = 0; i < data.monthList.length; i++) {
                                csvContent +=
                                    `${data.monthList[i]},${data.userTotal[i]},${data.guest[i]},${data.registerTotal[i]},${data.newguestTotal[i]}\n`;
                            }

                            var encodedUri = encodeURI(csvContent);
                            var link = document.createElement("a");
                            link.setAttribute("href", encodedUri);
                            link.setAttribute("download", "exported_data.csv");
                            document.body.appendChild(link);

                            link.click();
                        } else {
                            console.error("Data is not in the expected format:", data);
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/reports/index.blade.php ENDPATH**/ ?>