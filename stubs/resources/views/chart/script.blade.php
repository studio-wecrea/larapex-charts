    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
<script>
    function median(array) {
  array.sort((a, b) => a - b);
  const middleIndex = Math.floor(array.length / 2);
  return array[middleIndex];
}

    moment.locale('fr');
    var options =
    {
        chart: {
            type: '{!! $chart->type() !!}',
            height: {!! $chart->height() !!},
            width: '{!! $chart->width() !!}',
            toolbar: {!! $chart->toolbar() !!},
            zoom: {!! $chart->zoom() !!},
            fontFamily: '{!! $chart->fontFamily() !!}',
            foreColor: '{!! $chart->foreColor() !!}',
            sparkline: {!! $chart->sparkline() !!}
        },
        plotOptions: {
            bar: {!! $chart->horizontal() !!}
        },
        colors: {!! $chart->colors() !!},
        series: {!! $chart->dataset() !!},
        dataLabels: {!! $chart->dataLabels() !!},
        @if($chart->dashed())
        stroke: {
                width: [5, 5],
                curve: "straight",
                dashArray: [0, 8, 5]
        },
        @endif
        @if($chart->labels())
            labels: {!! json_encode($chart->labels(), true) !!},
        @endif
        title: {
            text: "{!! $chart->title() !!}"
        },
        subtitle: {
            text: '{!! $chart->subtitle() !!}',
            align: '{!! $chart->subtitlePosition() !!}'
        },
        yaxis: {
            @if($chart->dashed())
            annotations: [{
            y: median({!! $chart->dataset() !!}),
            label: {
            text: "Median",
            align: 'center',
            verticalAlign: 'top',
            offsetX: 0,
            offsetY: 10
            }
            }],
            @endif
            min: 0
        },
        fillOpacity:0,
        xaxis: {
            type: 'datetime',
            categories: {!! $chart->xAxis() !!},
            tickPlacement: 'on',
            @if($chart->format())
            labels: {
                formatter: function(value, timestamp, opts) {
                    return moment.utc(value).format('{!! $chart->format() !!}');
                },
                //format: '{!! $chart->format() !!}',
                datetimeUTC: true,
            },
            @endif

            @if($chart->tickAmount())
            tickAmount: {!! $chart->tickAmount() !!},
            @endif

        },
        @if($chart->formatLabel())
        tooltip: {
          x: {
            format: '{!! $chart->formatLabel() !!}',
          }
        },
        @endif
        grid: {!! $chart->grid() !!},
        markers: {!! $chart->markers() !!},
        @if($chart->stroke())
            stroke: {!! $chart->stroke() !!},
        @endif
    }

    
    var chart = new ApexCharts(document.querySelector("#{!! $chart->id() !!}"), options);
    
    chart.render();

</script>
