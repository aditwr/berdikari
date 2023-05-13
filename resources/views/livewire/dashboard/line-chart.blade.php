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
                    type: 'line',
                    data: {
                        labels: {{ json_encode($daftar_tanggal_bulan_ini) }},
                        datasets: [{
                            label: "{{ $label }}",
                            data: {{ json_encode($nominal_keuangan_bulan_ini) }},
                            fill: true,
                            borderWidth: 3,
                            borderColor: 'rgb(48, 97, 175)',
                            // gradient backgroundColor
                            backgroundColor: (context) => {
                                let gradient = context.chart.ctx.createLinearGradient(0, 0, 0, 400);
                                gradient.addColorStop(0, 'rgba(48, 97, 175, .6)');
                                gradient.addColorStop(1, 'rgba(48, 97, 175, 0)');
                                return gradient;
                            },
                            pointBackgroundColor: 'rgb(48, 97, 175)',
                            pointBorderColor: 'rgb(255, 255, 255)',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 8,
                            pointHoverBackgroundColor: 'rgb(48, 97, 175)',
                            cubicInterpolationMode: 'monotone',
                            tension: 0.4,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tanggal'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    usePointStyle: true,
                                }
                            },
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
                            subtitle: {
                                display: false,
                                text: 'Tahun 2023',
                                font: {
                                    size: 15,
                                    weight: 'regular',
                                },
                                // alignment
                                align: 'center',
                                padding: {
                                    bottom: 10,
                                }
                            },
                            tooltip: {
                                enabled: true,
                                displayColors: false,
                                titleFont: {
                                    size: 16,
                                    weight: 'medium',
                                },
                                bodyFont: {
                                    size: 15,
                                    weight: 'regular',
                                },
                                callbacks: {
                                    title: function(context) {
                                        return context[0].label + " " + "{{ $bulan_aktif }}" + " " +
                                            {{ $tahunAktif }};
                                    },
                                    label: function(context) {
                                        return 'Saldo : Rp. ' + context.formattedValue;
                                    },
                                }
                            },
                        },
                        interaction: {
                            intersect: false,
                        },
                    }
                }
                var chart = new Chart({{ $id_chart }}, config);

                window.addEventListener('refreshMonthChart', event => {
                    console.log(event.detail);
                    chart.data.datasets[0].label = event.detail.label;
                    chart.data.labels = event.detail.daftar_tanggal_bulan_ini;
                    chart.data.datasets[0].data = event.detail.nominal_keuangan_bulan_ini;
                    // update the tooltip
                    chart.options.plugins.tooltip.callbacks.title = function(context) {
                        return context[0].label + " " + event.detail.bulanAktif + " " +
                            event.detail.tahunAktif;
                    };

                    chart.update();
                });
            </script>
        </div>
    </div>
</div>
