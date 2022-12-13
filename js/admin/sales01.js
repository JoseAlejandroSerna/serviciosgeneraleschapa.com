var Option = {
    series: [{
        name: 'series1',
        data: [19, 9, 46, 22, 34, 15, 60, 41, 76, 36]
    }, ],
    chart: {
        type: 'line',
        height: 60,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            color: 'blue',
            opacity: 1,
        }
    },
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter() {
                    return '';
                }
            }
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    xaxis: {
        enabled: false
    },
}


var chart = new ApexCharts(
    document.querySelector(".chartBasic"),
    Option
);
chart.render();
// chartBasic1
var Option = {
    series: [{
        name: 'series1',
        data: [15, 60, 41, 76, 36, 19, 9, 46, 22, 34, ]
    }, ],
    chart: {
        type: 'line',
        height: 60,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            color: 'yellow',
            opacity: 1,
        }
    },
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter() {
                    return '';
                }
            }
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    xaxis: {
        enabled: false
    },
}


var chart = new ApexCharts(
    document.querySelector(".chartBasic1"),
    Option
);
chart.render();
// chartBasic2
var Option = {
    series: [{
        name: 'series1',
        data: [46, 60, 41, 76, 36, 19, 9, 36, 22, 24, ]
    }, ],
    chart: {
        type: 'line',
        height: 60,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            color: 'green',
            opacity: 1,
        }
    },
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter() {
                    return '';
                }
            }
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    xaxis: {
        enabled: false
    },
}


var chart = new ApexCharts(
    document.querySelector(".chartBasic2"),
    Option
);
chart.render();

// 2nd Maps

// 2nd finished Maps




// finished charts 
var mixedCharts = {
    series: [{
        name: 'TEAM A',
        type: 'column',
        data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
    }, {
        name: 'TEAM B',
        type: 'area',
        data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
    }, {
        name: 'TEAM C',
        type: 'line',
        data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
    }],
    chart: {
        height: 350,
        type: 'line',
        stacked: false,
        zoom: {
            enabled: false
        },
    },
    stroke: {
        width: [0, 2, 5],
        curve: 'smooth'
    },
    plotOptions: {
        bar: {
            columnWidth: '50%'
        }
    },

    fill: {
        opacity: [0.85, 0.25, 1],
        gradient: {
            inverseColors: false,
            shade: 'light',
            type: "vertical",
            opacityFrom: 0.85,
            opacityTo: 0.55,
            stops: [0, 100, 100, 100]
        }
    },
    labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003',
        '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'
    ],
    markers: {
        size: 0
    },
    xaxis: {
        type: 'datetime'
    },
    yaxis: {
        title: {
            text: 'Points',
        },
        min: 0
    },
    tooltip: {
        shared: true,
        intersect: false,
        y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return y.toFixed(0) + " points";
                }
                return y;

            }
        }
    }
};

var chart = new ApexCharts(document.querySelector(".mixedCharts"), mixedCharts);
chart.render();
// finished Mixed





// Column ColumnCharts
/*
var options = {
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
        name: 'Revenue',
        data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }, {
        name: 'Free Cash Flow',
        data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
    }],
    chart: {
        type: 'bar',
        height: 400,
        sparkline: {
            enabled: true
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter() {
                    return '';
                }
            }
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    xaxis: {
        enabled: false
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "$ " + val + " thousands"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector(".ColumnCharts"), options);
chart.render();
*/
// bubbleCharts

// RadialBarCharts
var RadialBarCharts = {
    series: [44, 55, 67, 83],
    chart: {
        height: 350,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'Total',
                    formatter: function (w) {
                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        return 249
                    }
                }
            }
        }
    },
    labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
};

var chart = new ApexCharts(document.querySelector(".RadialBarCharts"), RadialBarCharts);
chart.render();

// ScatterCharts
var ScatterCharts = {
    series: [{
        name: 'Messenger',
        data: [
            [16.4, 5.4],
            [21.7, 4],
            [25.4, 3],
            [19, 2],
            [10.9, 1],
            [13.6, 3.2],
            [10.9, 7],
            [10.9, 8.2],
            [16.4, 4],
            [13.6, 4.3],
            [13.6, 12],
            [29.9, 3],
            [10.9, 5.2],
            [16.4, 6.5],
            [10.9, 8],
            [24.5, 7.1],
            [10.9, 7],
            [8.1, 4.7],
            [19, 10],
            [27.1, 10],
            [24.5, 8],
            [27.1, 3],
            [29.9, 11.5],
            [27.1, 0.8],
            [22.1, 2]
        ]
    }, {
        name: 'Instagram',
        data: [
            [6.4, 5.4],
            [11.7, 4],
            [15.4, 3],
            [9, 2],
            [10.9, 11],
            [20.9, 7],
            [12.9, 8.2],
            [6.4, 14],
            [11.6, 12]
        ]
    }],
    chart: {
        height: 350,
        type: 'scatter',
        animations: {
            enabled: false,
        },
        zoom: {
            enabled: false,
        },
        toolbar: {
            show: false
        }
    },
    colors: ['#056BF6', '#D2376A'],
    xaxis: {
        tickAmount: 10,
        min: 0,
        max: 40
    },
    yaxis: {
        tickAmount: 7
    },
    markers: {
        size: 20
    },
    fill: {
        type: 'image',
        opacity: 1,
        image: {
            src: ['dist/Assets/icon/fb.svg', 'dist/Assets/icon/instagram.svg'],
            width: 40,
            height: 40
        }
    },
    legend: {
        labels: {
            useSeriesColors: true
        },
        markers: {
            customHTML: [
                function () {
                    return ''
                },
                function () {
                    return ''
                }
            ]
        }
    }
};

var chart = new ApexCharts(document.querySelector(".ScatterCharts"), ScatterCharts);
chart.render();