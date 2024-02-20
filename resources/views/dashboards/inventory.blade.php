<div class="row">
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-bd lobidisable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>{{ __('Items on minimum') }}</h4>
                </div>
            </div>
            <div class="panel-body">
                <canvas id="singleBarChart"></canvas>
            </div>
        </div>
    </div>
</div>




<script>
    const ctx = document.getElementById('singleBarChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($data->map(fn ($data) => $data->name)),
            datasets: [{
                data: @json($data->map(fn ($data) => $data->on_hand)),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    begintAtZero: true
                }
            }
        }
    });

</script>
