@extends('layouts.project')
@section('css')
<link rel="stylesheet" href="/css/details/details.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.css">
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top: 40px">
        <div class="col" style="position: relative">
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Type To Search">
            </div>
        </div>
        <div class="col">
            <div class="date">
                <input class="picker" type="text">
            </div>
        </div>
        <div class="col1" style="display: flex;flex-direction:column; justify-content: center;align-items: center;">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<img src="/img/avatar.png" class="user"></p>
            <br>
            <button id="modalBtn" class="add">+ Add Funds</button>
            <div class="budget" style="margin-top: 25px;font-size:15px">
               <h1 class="heading"> Budgets</h1>
                <p class="pgraph">December <i class="fas fa-angle-down"></i></p>
            </div>
            <div class="box1" style="margin-top:25px">
                <p style="color:#62e7a7"><i class="fas fa-map"></i> Travel<span></span> $140</p>
            </div>
            <div class="box2" style="margin-top:24px">
                <p style="color:#d27fe7"><i class="fas fa-bus"></i> Transport <span></span>$240</p>
            </div>
            <div class="box3" style="margin-top:24px">
                <p style="color: darkblue"><i class="fas fa-shopping-basket"></i> Grocery<span></span>$140</p>
            </div>
            <div class="newbudget" style="margin-top:24px">
                <p style="color: darkblue">+ Add new card</p>
            </div>
        </div>
    </div>

    <br />
    <br />
    <div class="row" style="margin-top: 20px">
        <div class="section">
            <div class="column2">
                <div class="card">
                    <h2>Wallet Balance</h2>
                    <p>32,549.00<sup> $ </sup></p>
                </div>
            </div>

            <div class="cardsection">
                <div class="card1">
                </div>
            </div>

            <div class="column4">
                <div class="card2">
                    <p>+ Add new card</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row"
        style="margin-top: 15px;display: flex;justify-content: space-around;margin-bottom: 50px;overflow-y: hidden;">
        <div class="col-6" style="padding: 0">
            <h1 style="float:left">Expenses activity</h1>
            <h1 style="float: right">This Week <i class="fas fa-angle-down"></i></h1>
            <div id="expense-review-chart-container">
                <canvas id="myChart" width="400" height="400"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
                <div class="content">
                    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
                    <script>
                        var actualData = [{
                                day: 'Sunday',
                                expenditure: '200',
                            },
                            {
                                day: 'Monday',
                                expenditure: '300',
                            },
                            {
                                day: 'Tuesday',
                                expenditure: '140',
                            },
                            {
                                day: 'Wednesday',
                                expenditure: '180',
                            },
                            {
                                day: 'Thursday',
                                expenditure: '175',
                            },
                            {
                                day: 'Friday',
                                expenditure: '120',
                            },
                            {
                                day: 'Saturday',
                                expenditure: '450',
                            },
                        ];
                        var DATA_COUNT = actualData.length;
                        var ctx = document.getElementById("myChart");
                        var utils = Samples.utils;
                        utils.srand(110);

                        function colorize(opaque, context) {
                            var value = context.dataset.data[context.dataIndex];
                            var x = value.x / 100;
                            var y = value.y / 100;
                            var r = Math.floor(Math.random() * Math.floor(255));
                            var g = Math.floor(Math.random() * Math.floor(255));
                            var b = Math.floor(Math.random() * Math.floor(255));
                            var a = opaque ? 1 : 0.9 * value.v / 1000;
                            return 'rgba(' + r + ',' + g + ',' + b + ',' + a + ')';
                        }

                        function generateData() {
                            var data = [];
                            var i;
                            for (i = 0; i < DATA_COUNT; ++i) {
                                data.push({
                                    x: i + 50,
                                    y: actualData[i].expenditure,
                                    v: actualData[i].expenditure,
                                    label: actualData[i].day
                                });
                            }
                            return data;
                        }
                        var data = {
                            datasets: [{
                                data: generateData()
                            }]
                        };
                        var options = {
                            aspectRatio: 1,
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 50,
                                    top: 50,
                                    bottom: 50
                                }
                            },
                            legend: false,
                            tooltips: {
                                fontFamily: 'Montserrat, sans-serif',
                                callbacks: {
                                    labelColor: function (tooltipItem, chart) {
                                        return {
                                            borderColor: 'red',
                                            backgroundColor: 'red'
                                        };
                                    },
                                    labelBackgroundColor: function (tooltipItem, chart) {
                                        return colorize.bind(null, false)
                                    },
                                    labelTextColor: function (tooltipItem, chart) {
                                        return '#fff';
                                    },
                                    label: function (tooltipItem, data) {
                                        var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += "Rs. " + Math.floor(Math.round(tooltipItem.yLabel * 100) /
                                        100);
                                        label += " spent on " + actualData[tooltipItem.index].day
                                        return label;
                                    }
                                }
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    },
                                    ticks: {
                                        fontFamily: 'Montserrat, sans-serif',
                                        // Include a dollar sign in the ticks
                                        callback: function (value, index, values) {
                                            return actualData[index] ? actualData[index].day : 0;
                                        }
                                    }
                                }],
                                yAxes: [{
                                    gridLines: {
                                        color: "rgb(220,221, 229)"
                                    },
                                    ticks: {
                                        fontFamily: 'Montserrat, sans-serif',
                                        // Include a dollar sign in the ticks
                                        callback: function (value, index, values) {
                                            return value;
                                        }
                                    }
                                }]
                            },
                            elements: {
                                point: {
                                    backgroundColor: colorize.bind(null, false),
                                    borderColor: colorize.bind(null, true),
                                    borderWidth: function (context) {
                                        return Math.min(Math.max(1, context.datasetIndex + 1), 8);
                                    },
                                    hoverBackgroundColor: 'transparent',
                                    hoverBorderColor: function (context) {
                                        return utils.color(context.datasetIndex);
                                    },
                                    hoverBorderWidth: function (context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        return Math.round(8 * value.v / 1000);
                                    },
                                    radius: function (context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        var size = context.chart.width;
                                        var base = Math.abs(value.v) / 1000;
                                        return (size / 5) * base;
                                    }
                                }
                            }
                        };
                        var myChart = new Chart(ctx, {
                            type: 'bubble',
                            data: data,
                            options: options
                        });

                    </script>
                </div>
            </div>
        </div>
        <div class="col-6" style="padding: 0;marigin-left:80px">
            <h3>Expenses Breakdown</h3>
            <div class="expensesitems">
                <div class="items" style="margin-top:20px">
                <i class="fas fa-store" style="color:rgb(240, 130, 146)"></i> &nbsp; Prime super shop
                    <span style="color:rgb(240, 130, 146)"> $140 </span></p>
                    <p> Grocery</p>
                </div>

                <div class="items" style="margin-top:25px">
                     <i class="fas fa-store" style="color:rgb(82, 197, 159)"></i> &nbsp; Prime super shop
                     <span style="color:rgb(82, 197, 159);font-size:15px"> $140 </span></p>
                       <p>Mobile</p>
                </div>

                <div class="items" style="margin-top:25px">
                    <i class="fas fa-store" style=" color:rgb(240, 130, 146)"></i>
                     &nbsp; Prime super shop
                     <span style="color:rgb(240, 130, 146);font-size:15px"> $140 </span></p>
                     <p>Grocery</p>
                </div>

                <div class="items" style="margin-top:25px">
                    <i class="fas fa-store" style="color:rgb(82, 197, 159)"></i>
                    &nbsp; Prime super shop
                    <span style="color:rgb(82, 197, 159);font-size:15px"> $140 </span></p>
                      <p>Grocery</p>
                </div>

                <div class="items" style="margin-top:25px">
                    <i class="fas fa-store" style="color:rgb(240, 130, 146)"></i>
                    &nbsp; Prime super shop
                    <span style="color:rgb(240, 130, 146);font-size:15px"> $140 </span></p>
                     <p>Grocery</p>
                </div>
            </div>
        </div>
    </div>

    <br />
    <br />

    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.min.js"></script>
{{-- p5js.js  --}}
<script src="/dependencies/p5/p5.min.js"></script>
<script src="/js/project_show/details-chart.js"></script>
{{-- #chart-p5 --}}
@endsection
