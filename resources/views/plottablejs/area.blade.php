@include('charts::_partials.container.svg')

<script type="text/javascript">
    $(function() {
        @include('charts::plottablejs._data.one')

        var xScale = new Plottable.Scales.Category();
        var yScale = new Plottable.Scales.Linear();

        var xAxis = new Plottable.Axes.Category(xScale, 'bottom');
        var yAxis = new Plottable.Axes.Numeric(yScale, 'left');

        var plot = new Plottable.Plots.Area()
            .addDataset(new Plottable.Dataset(data))
            .x(function(d) { return d.x; }, xScale)
            .y(function(d) { return d.y; }, yScale)
            @if($model->colors)
                .attr('stroke', "{{ $model->colors[0] }}")
                .attr('fill', "{{ $model->colors[0] }}")
            @endif
            .animated(true);

        var title;
        @if($model->title)
            title = new Plottable.Components.TitleLabel("{{ $model->title }}").yAlignment('center');
        @endif
        var label = new Plottable.Components.AxisLabel("{{ $model->element_label }}").yAlignment('center');

        var table = new Plottable.Components.Table([[label, title],[yAxis, plot],[null, xAxis]]);
        table.renderTo('svg#{{ $model->id }}');

        window.addEventListener('resize', function() {
            table.redraw()
        })
    });
</script>
