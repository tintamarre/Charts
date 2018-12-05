let {{ $chart->id }}_rendered = false;
let {{ $chart->id }}_load = function () {
    if (document.getElementById("{{ $chart->id }}") && !{{ $chart->id }}_rendered) {
        @if ($chart->api_url)
        $.get("{!! $chart->api_url !!}", function(response){
          labels = response.labels;
          datasets = response.datasets;
          {{ $chart->id }}_create(datasets);
       });
        @else
        {{ $chart->id }}_create({!! $chart->formatDatasets() !!})
        @endif
    }
};
window.addEventListener("load", {{ $chart->id }}_load);
document.addEventListener("turbolinks:load", {{ $chart->id }}_load);
