<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($tanggal_pengembalian as $item)
                    {{$item}},
                @endforeach
            ],
            datasets: [{
                label: 'Selesai Dipinjam',
                data: [
                    @foreach ($count as $item)
                        {{$item}},
                    @endforeach
                ],
                backgroundColor: '#f012be',
                borderWidth: 1
            }]
        },
        options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true
                    }
                },
            }
    });
    
    Livewire.on('ubahBulanTahun', () => {
            var ctx = document.getElementById('myChart');
            if (typeof myChart !== 'undefined' && myChart !== null) {
                myChart.destroy(); // Destroy the existing chart instance
            }
        });
    
        Livewire.on('ubahBulanTahun', (count, tanggal_pengembalian) => {
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: tanggal_pengembalian,
                    datasets: [{
                        label: 'Buku Selesai Dipinjam',
                        data: count,
                        backgroundColor: '#f012be',
                        borderWidth: 1
                    }]
                },
                options: {
                    events: ['mousemove', 'mouseout', 'touchstart', 'touchmove'],
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            display: true
                        }
                    },
                }
            });
        });
    </script>