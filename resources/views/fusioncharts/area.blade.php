<script type="text/javascript">
    FusionCharts.ready(function () {
        var revenueChart = new FusionCharts({
            type: 'area2d',
            renderAt: "{{ $model->id }}",
            @include('charts::_partials.dimension.js')
            dataFormat: 'json',
            dataSource: {
                'chart': {
                    @if($model->title)
                    'caption': "{{ $model->title }}",
                    @endif
                    'yAxisName': "{{ $model->element_label }}",
                    @if($model->colors)
                        'paletteColors': "{{ $model->colors[0] }}",
                    @endif
                    'bgColor': '#ffffff',
                    'borderAlpha': '20',
                    'canvasBorderAlpha': '0',
                    'usePlotGradientColor': '0',
                    'plotBorderAlpha': '10',
                    'rotatevalues': '1',
                    'valueFontColor': '#ffffff',
                    'showXAxisLine': '1',
                    'xAxisLineColor': '#999999',
                    'divlineColor': '#999999',
                    'divLineIsDashed': '1',
                    'showAlternateHGridColor': '0',
                    'subcaptionFontBold': '0',
                    'subcaptionFontSize': '14'
                },
                'data': [
                    @for ($i = 0; $i < count($model->values); $i++)
                        $l = $model->labels[$i];
                        {
                            'label': "{{ $model->labels[$i] }}",
                            'value': "{{ $model->values[$i] }}",
                        },
                    @endfor
                ],
            }
        }).render()
    });
</script>

<div id="{{ $model->id }}"></div>
