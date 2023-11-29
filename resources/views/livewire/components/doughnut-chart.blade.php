<div>
    <div class="w-full">
        <div id="chart-container" class="{{ $container_class }}">
            <canvas id="{{ $id_chart }}"></canvas>
        </div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endpush

        <div>
            <script>
                let {{ $id_chart }} = document.getElementById("{{ $id_chart }}").getContext('2d');
                config = {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($labels) !!}, // label keuangan
                        datasets: [{
                            label: "{{ $label }}",
                            data: {!! json_encode($data) !!}, // saldo keuangan
                            backgroundColor: [
                                // rose
                                "#f43f5e",
                                // yellow
                                "#eab308",
                                // green
                                "#22c55e",
                                // blue
                                "#3b82f6",
                                // purple
                                "#a855f7",
                                // pink
                                "#ec4899",
                                // indigo
                                "#6366f1",
                                // cyan
                                "#06b6d4",
                                // lime,
                                "#84cc16",
                                // emerald
                                "#10b981",
                                // teal
                                "#14b8a6",
                            ],
                            borderRadius: 2,
                            borderWidth: 4,
                            hoverOffset: 12,
                            hoverBorderWidth: 2,
                            hoverBorderColor: "#334155",
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: false,
                                text: "judul awal",
                                font: {
                                    size: 20,
                                    weight: 'bold',
                                },
                                // alignment
                                align: 'center',

                            },
                            legend: {
                                position: 'bottom',
                            },
                        },
                    }
                }
                var chart_{{ $id_chart }} = new Chart({{ $id_chart }}, config);

                window.addEventListener('refreshDoughnutChart', event => {
                    chart_{{ $id_chart }}.data.labels = event.detail.labels;
                    chart_{{ $id_chart }}.data.datasets[0].data = event.detail.data;
                    chart_{{ $id_chart }}.update();
                });
            </script>
        </div>
    </div>
</div>
