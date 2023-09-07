@if(!empty($transformedDatafilter))
<div class="tile is-ancestor">
    <div class="tile is-7 is-parent">
        <div class="card tile is-child">
            <p class="card-header-title">Ruangan Booking</p>
            <div class="card-content">
                <div id="chart1filter"></div>
            </div>
        </div>
    </div>
    <div class="tile is-parent">
        <div class="card tile is-child">
            <p class="card-header-title">Profesi Pengunjung</p>
            <div class="card-content is-centered">
                <div id="chart2filter"></div>
            </div>
        </div>
    </div>
</div>
<div class="tile is-ancestor">
    <div class="tile is-parent">
        <div class="card tile is-child">
            <p class="card-header-title">Keahlian Pengunjung</p>
            <div class="card-content">
                <div id="chart4filter"></div>
            </div>
        </div>
    </div>
    <div class="tile is-parent is-4">
        <div class="card tile is-child">
            <p class="card-header-title">Review Pengunjung</p>
            <div class="card-content is-centered">
                <div class="columns">
                    <div class="column">
                        <h1 class="title mb-0">
                            {{floor($rataRating*10)/10}}
                        </h1>
                        <i data-star="{{floor($rataRating*10)/10}}" style="font-size:25px;"></i>
                        <h3 class="subtitle">
                            {{$totalLike}} reviews
                        </h3>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column is-1">
                        5
                    </div>
                    <div class="column" style="display:flex;align-items:center;">
                        <progress class="progress is-small is-warning" value="{{$Like5}}" max="{{$totalLike}}" max-width="100px"></progress>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column is-1">
                        4
                    </div>
                    <div class="column" style="display:flex;align-items:center;">
                    <progress class="progress is-small is-warning" value="{{$Like4}}" max="{{$totalLike}}" max-width="100px"></progress>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column is-1">
                        3
                    </div>
                    <div class="column" style="display:flex;align-items:center;">
                    <progress class="progress is-small is-warning" value="{{$Like3}}" max="{{$totalLike}}" max-width="100px"></progress>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column is-1">
                        2
                    </div>
                    <div class="column" style="display:flex;align-items:center;">
                    <progress class="progress is-small is-warning" value="{{$Like2}}" max="{{$totalLike}}" max-width="100px"></progress>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column is-1">
                        1
                    </div>
                    <div class="column" style="display:flex;align-items:center;">
                    <progress class="progress is-small is-warning" value="{{$Like1}}" max="{{$totalLike}}" max-width="100px"></progress>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tile is-ancestor">
    <div class="tile is-parent">
        <div class="card tile is-child">
            <p class="card-header-title">Prime Time Booking</p>
            <div class="card-content is-centered">
                <div id="chart3filter"></div>
            </div>
        </div>
    </div>
</div>
@else
<div class="tile is-ancestor">
    <div class="tile is-parent">
        <div class="card tile is-child">
            <div class="card-content is-centered">
                Tidak ada data yang tersedia untuk tanggal ini...
            </div>
        </div>
    </div>
</div>
@endif
<script>
    var chart1filter = {
        series: [{
            data: {!! json_encode($transformedDatafilter) !!},
            name: 'Total'
        }],
        chart: {
            height: 332,
            type: 'bar'
        },
        colors: ['#2c598d', '#3b79c0', '#5893dc', '#74aef8'],
        plotOptions: {
            bar: {
                columnWidth: '30%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: {!! json_encode($transformedData2filter) !!},
            labels: {
                style: {
                    colors: ['#000000'],
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return Math.floor(value);
                }
            }
        }
    };

    var chart2filter = {
        series: {!! json_encode($result2Datafilter) !!},
        chart: {
            width: 456,
            type: 'pie',
        },
        legend: {
            display: false,
            position: 'bottom'
        },
        labels: {!! json_encode($result2Data2filter) !!},
        colors: ['#6099d2', '#d29960', '#99d260', '#9960d2', '#CFA3FD'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }]
    }

    var chart3filter = {
        series: [{
            name: "Booking",
            data: {!! json_encode($valuesTimefilter) !!}
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Prime Time Booking',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
        }
    };

    var chart4filter = {
        series: [{
            data: {!! json_encode($result1skillfilter) !!},
            name: 'Total'
        }],
        chart: {
            height: 332,
            type: 'bar'
        },
        colors: ['#2c598d', '#3b79c0', '#5893dc', '#74aef8'],
        plotOptions: {
            bar: {
                columnWidth: '30%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: {!! json_encode($result2skillfilter) !!},
            labels: {
                style: {
                    colors: ['#000000'],
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return Math.floor(value);
                }
            }
        }
    };
    var chart1filter = new ApexCharts(document.querySelector("#chart1filter"), chart1filter);
    chart1filter.render();
    var chart2filter = new ApexCharts(document.querySelector("#chart2filter"), chart2filter);
    chart2filter.render();
    var chart3filter = new ApexCharts(document.querySelector("#chart3filter"), chart3filter);
    chart3filter.render();
    var chart4filter = new ApexCharts(document.querySelector("#chart4filter"), chart4filter);
    chart4filter.render();
</script>