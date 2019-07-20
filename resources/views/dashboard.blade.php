@extends('layouts.app')

@section("content")
    <div class="row">
        <div class="col-lg-8">
            <div class="box box-danger">
                <div class="box-header box-with-border">
                    <div class="box-body">
                        <div id="container" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="box box-danger">
                <div class="box-header box-with-border">
                    <div class="box-body">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="box box-solid bg-light">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-th"></i>

                    <h3 class="box-title">Sales Graph</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn bg-light btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn bg-light btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 250px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                       </div>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>

@endsection

@push('scripts-footer')
    <script src="{{asset('plugins/highcharts/highcharts.js')}}"></script>
    <script src="{{asset('plugins/highcharts/modules/map.js')}}"></script>

    <script>
        var data = $.ajax({
            url: "/js/geojson/data.json",
            dataType: "json",
            async: false
        }).responseText;
        data = JSON.parse(data);
        $.getJSON("/js/geojson/rn.json", function (geojson) {
            var chart = new Highcharts.Map('container', {
                chart: {
                    map: geojson
                },
                title:{text:'Mapa de denúncias'}
                ,
                plotOptions: {
                    map: {
                        allAreas: false,
                    },
                    series: {
                        events: {
                            click: function (e) {
                                console.log(e.point.id)
                            }
                        }
                    }
                },
                series: [{
                    data: data.values,
                    keys: ['id', 'value'],
                    joinBy: 'id',
                    name: "Denúncias"
                }],
                colorAxis: {
                    minColor: '#fff',
                    maxColor: '#82250C',
                    labels: {
                        // @=
                        // step: 2000,
                        enabled: true,
                    }
                },
                legend: {
                    title: {
                        text: 'Denúncias / mil habitantes'
                    }
                },
            });
        })

        $.ajax({
            url:'{{route("municipios_precos.show", "240810")}}',
            dataType: "json",
            success:function (data, status) {
                console.log(data);
                var chart = Highcharts.chart('line-chart',{
                    chart: {
                        backgroundColor: null
                    },
                    title: {
                        text: 'Média de preços entre 2004 e 2012'
                    },
                    yAxis: {
                        title: {text: 'Preço (R$) '}
                    },
                    series:[
                        {
                            data: data.results[240200].map(Number),
                            name: 'Caicó'
                        },
                        {
                            data: data.results[240325].map(Number),
                            name: 'Parnamirim'
                        },{
                            data: data.results[240800].map(Number),
                            name: 'Mossoró'
                        },{
                            data: data.results[240810].map(Number),
                            name: 'Natal'
                        },
                    ]
                })
            }
        })
    </script>
@endpush