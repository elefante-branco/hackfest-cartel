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
        data = JSON.parse(data)
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
                }
            });
        })
    </script>
@endpush