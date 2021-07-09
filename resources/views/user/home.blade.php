@extends('layouts.master')
@section('title','-User Home')
@section('content')

    <div id="social" class="content-block">

        <div class="main-content" style="margin-top: 10px; padding: 5px;">

            <div class="widget-main-title">Account Statistics</div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


            <div id="pie_chart" style="width:500px; height:300px;">
            </div>

            <script src="http://code.highcharts.com/highcharts.js"></script>
            <script src="http://code.highcharts.com/modules/exporting.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    var photos = <?php echo json_encode($photos); ?>;
                    var options = {
                        chart: {
                            renderTo: 'pie_chart',
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                            text: 'Photo Uploaded Status'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                            percentageDecimals: 1
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    color: '#000000',
                                    connectorColor: '#000000',
                                    formatter: function() {
                                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                                    }
                                }
                            }
                        },
                        series: [{
                            type:'pie',
                            name:'photos'
                        }]
                    }
                    myarray = [];
                    $.each(photos, function(index, val) {
                        myarray[index] = [val.status, val.count];
                    });
                    options.series[0].data = myarray;
                    chart = new Highcharts.Chart(options);

                });
            </script>



            </div>
        </div>
    </div>



@endsection
