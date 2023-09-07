<!DOCTYPE html>
<html
    lang="en"
    class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
    <head>
        <link rel="shortcut icon" href="https://i.ibb.co/TrwLnwM/justlogo.png" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Visit Techno</title>

        <!-- Bulma is included -->
        <link rel="stylesheet" href="{{ URL::asset('adminsrc/css/main.min.css') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
            type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('adminsrc/css/stardecimal.css') }}">
    </head>
    <style>
        .tabs li.is-active a {
            border-bottom-color: #2c598d;
            color: #2c598d;
        }

        @media all and (min-width:1024px) {
            td {
                max-width: 344px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }
        @media all and (max-width:1024px) {
            table {
                table-layout: fixed;
                width: 378;
            }
            td {
                max-width: 378;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }
        @keyframes modal-show {
            0% {
                transform: scale(0.7);
            }
            45% {
                transform: scale(1.05);
            }
            80% {
                transform: scale(0.95);
            }
            100% {
                transform: scale(1);
            }
        }
        .modal-card {
            animation-name: modal-show;
            animation-duration: 0.5s;
        }
        .button.is-primary{
            background-color: #2c598d;
        }
        .button.is-primary:hover{
            background-color: #234771;
        }
        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
            position: absolute;
            top: 51%;
            left: 36.5%;
            margin: -50px 0 0 -50px;
        }
        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        #overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 5;
            top: 0;
            background: rgba(0, 0, 0, 0.5);
        }
    </style>
    <body>
        <div id="overlay" hidden="hidden">
            <div class="lds-dual-ring"></div>
        </div>
        @include('admin/swaljs')
        @include('sweetalert::alert')
        <div id="app">
            <nav id="navbar-main" class="navbar is-fixed-top">
                <div class="navbar-brand">
                    <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
                        <span class="icon">
                            <i class="mdi mdi-forwardburger mdi-24px"></i>
                        </span>
                    </a>
                </div>
                <div class="navbar-brand is-right">
                    <a
                        class="navbar-item is-hidden-desktop jb-navbar-menu-toggle"
                        data-target="navbar-menu">
                        <span class="icon">
                            <i class="mdi mdi-dots-vertical"></i>
                        </span>
                    </a>
                </div>
                <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
                    <div class="navbar-end">
                        <a
                            href="{{route('logout')}}"
                            title="Log out"
                            class="navbar-item is-desktop-icon-only">
                            <span class="icon">
                                <i class="mdi mdi-logout"></i>
                            </span>
                            <span>Log out</span>
                        </a>
                    </div>
                </div>
            </nav>
            <aside class="aside is-placed-left is-expanded">
                <div class="aside-tools">
                    <div class="aside-tools-label">
                        <span>
                            <b>Admin</b>
                            Visit Techno</span>
                    </div>
                </div>
                <div class="menu is-menu-main">
                    <ul class="menu-list">
                        <li>
                            <a href="/dashboard" class="is-active has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-desktop-mac"></i>
                                </span>
                                <span class="menu-item-label">Home</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="{{route('cmsuser')}}" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-account-circle"></i>
                                </span>
                                <span class="menu-item-label">User Management</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="/cmsroom" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-home-circle"></i>
                                </span>
                                <span class="menu-item-label">Room Management</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="/bookinglist" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-view-list"></i>
                                </span>
                                <span class="menu-item-label">Booking List</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="/review" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-book"></i>
                                </span>
                                <span class="menu-item-label">Review</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- <section class="section is-title-bar">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <ul>
                                <li>Admin</li>
                                <li>Home</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="hero is-hero-bar">
                <div class="hero-body">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <h1 class="title">
                                    Home
                                </h1>
                            </div>
                        </div>
                        <div class="level-right" style="display: none;">
                            <div class="level-item"></div>
                        </div>
                    </div>
                </div>
            </section> -->
            <section class="section is-main-section">
                <div class="columns mb-0 pb-0 mt-0 pt-0">
                    <div class="column mb-0 pb-0 mt-0 pt-0" style="display:flex;flex-direction:column;max-width:15vw;">
                        Tanggal Awal
                        <input  id="filterstart" class="search input mb-3 filter" type="date" placeholder="Search" style="max-width:15vw;">
                    </div>
                    <div class="column mb-0 pb-0 mt-0 pt-0" style="display:flex;flex-direction: column;max-width:15vw;">
                        Tanggal Akhir
                        <input  id="filterend" class="search input mb-3 filter" type="date" placeholder="Search" style="max-width:15vw;">
                    </div>
                    <div class="column mt-0 pt-0" style="display:flex;align-items:flex-end;">
                        <div class="buttons">
                            <a id="resetfilter" class="button is-primary">
                                Reset
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div id="base">
                    <div class="tile is-ancestor">
                        <div class="tile is-7 is-parent">
                            <div class="card tile is-child">
                                <p class="card-header-title">Ruangan Booking</p>
                                <div class="card-content">
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tile is-parent">
                            <div class="card tile is-child">
                                <p class="card-header-title">Profesi Pengunjung</p>
                                <div class="card-content is-centered">
                                    <div id="chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile is-ancestor">
                        <div class="tile is-parent">
                            <div class="card tile is-child">
                                <p class="card-header-title">Keahlian Pengunjung</p>
                                <div class="card-content">
                                    <div id="chart4"></div>
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
                                    <div id="chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div id="base">
                    <div class="tile is-ancestor">
                        <div class="tile is-6 is-parent" style="min-height: 294px">
                            <div class="card tile is-child">
                                <p class="card-header-title">Ruangan Booking</p>
                                <div class="card-content" style="padding:0;">
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tile is-parent">
                            <div class="card tile is-child">
                                <p class="card-header-title">Keahlian Pengunjung</p>
                                <div class="card-content" style="padding:0;">
                                    <div id="chart4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile is-ancestor">
                        <div class="tile is-3 is-parent">
                            <div class="card tile is-child">
                                <p class="card-header-title">Review Pengunjung</p>
                                <div class="card-content" style="padding-top: 0">
                                    <div class="columns">
                                        <div class="column" style="padding-bottom: 0;"  style="font-size: 27px">
                                            <h1 class="title mb-0">
                                                {{floor($rataRating*10)/10}}
                                            </h1>
                                            <i data-star="{{floor($rataRating*10)/10}}" style="font-size:25px;"></i>
                                            <h3 class="subtitle"  style="font-size: 15px">
                                                {{$totalLike}} reviews
                                            </h3>
                                        </div>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span>5</span>
                                        <progress class="progress is-small is-warning" value="{{$Like5}}" max="{{$totalLike}}" max-width="100px" style="margin-left: 8px;"></progress>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span>4</span>
                                        <progress class="progress is-small is-warning" value="{{$Like4}}" max="{{$totalLike}}" max-width="100px" style="margin-left: 8px;"></progress>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span>3</span>
                                        <progress class="progress is-small is-warning" value="{{$Like3}}" max="{{$totalLike}}" max-width="100px" style="margin-left: 8px;"></progress>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span>2</span>
                                        <progress class="progress is-small is-warning" value="{{$Like2}}" max="{{$totalLike}}" max-width="100px" style="margin-left: 8px;"></progress>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                        <span>1</span>
                                        <progress class="progress is-small is-warning" value="{{$Like1}}" max="{{$totalLike}}" max-width="100px" style="margin-left: 8px;"></progress>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile is-parent">
                            <div class="card tile is-child">
                                <p class="card-header-title">Profesi Pengunjung</p>
                                <div class="card-content" style="padding:0;">
                                    <div id="chart2" style="display:flex; justify-content:center;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tile is-parent">
                            <div class="card tile is-child">
                                <p class="card-header-title">Prime Time Reservasi</p>
                                <div class="card-content" style="padding:0;">
                                    <div id="chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="dashboard-filter" style="display:none;"></div>
            </section>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                © 2023, Visit techno Project
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <script
                type="text/javascript"
                src="{{ URL::asset('adminsrc/js/main.min.js') }}"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
            <script type="text/javascript" src="{{ URL::asset('adminsrc/js/apexchart.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            
                
            <!-- Icons below are for demo only. Feel free to use any icon pack. Docs:
            https://bulma.io/documentation/elements/icon/ -->
            <link
                rel="stylesheet"
                href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
            <script>
                var chart1 = {
                    series: [{
                        data: {!! json_encode($transformedData) !!},
                        name: 'Total'
                    }],
                    chart: {
                        height: 205,
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
                        categories: {!! json_encode($transformedData2) !!},
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

                var chart2 = {
                    series: {!! json_encode($result2Data) !!},
                    chart: {
                        width: 310,
                        type: 'pie',
                    },
                    legend: {
                        display: false,
                        position: 'bottom'
                    },
                    labels: {!! json_encode($result2Data2) !!},
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

                var chart3 = {
                    series: [{
                        name: "Booking",
                        data: {!! json_encode($valuesTime) !!}
                    }],
                    chart: {
                        height: 230,
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

                var chart4 = {
                    series: [{
                        data: {!! json_encode($result1skill) !!},
                        name: 'Total'
                    }],
                    chart: {
                        height: 205,
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
                        categories: {!! json_encode($result2skill) !!},
                        labels: {
                            style: {
                                colors: ['#000000'],
                                fontSize: '10px'
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

                var chart1 = new ApexCharts(document.querySelector("#chart1"), chart1);
                chart1.render();
                var chart2 = new ApexCharts(document.querySelector("#chart2"), chart2);
                chart2.render();
                var chart3 = new ApexCharts(document.querySelector("#chart3"), chart3);
                chart3.render();
                var chart4 = new ApexCharts(document.querySelector("#chart4"), chart4);
                chart4.render();

                $(function () {
                    var dtToday = new Date();
                    var month = dtToday.getMonth() + 1;
                    var day = dtToday.getDate();
                    var year = dtToday.getFullYear();
                    if (month < 10) 
                        month = '0' + month.toString();
                    if (day < 10) 
                        day = '0' + day.toString();
                    var maxDate = year + '-' + month + '-' + day;
                    $('.filter').attr('max', maxDate);
                    $('#filterend').attr('max', maxDate);
                });

                $("#filterstart").change(function(){
                    $("#filterend").val("");
                    $("#filterend").attr("min", $("#filterstart").val());
                });

                $("#filterend").change(function(){
                    if($("#filterstart").val()){
                        $.ajax({
                            type: "get",
                            url: "{{route('dashboardfilter')}}",
                            data: {
                                filterstart: $("#filterstart").val(),
                                filterend: $("#filterend").val()
                            },
                            beforeSend: function () {
                                $("#overlay").show();
                            },
                            success: function (filter) {
                                $("#base").hide();
                                $("#dashboard-filter").html(filter);
                                $("#dashboard-filter").show();
                                $("#overlay").hide();
                            }
                        });
                    }
                });

                $("#resetfilter").click(function(){
                    $("#overlay").show();
                    $("#filterend").attr("max", "");
                    $("#filterend").val("");
                    $("#filterstart").val("");
                    $("#dashboard-filter").html("");
                    $("#dashboard-filter").hide();
                    $("#base").show();
                    setTimeout(function() {
                        $("#overlay").hide();
                    }, 400);
                });
            </script>
        </body>
    </html>