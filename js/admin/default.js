$(function () {
    "use strict";
    // Default morris-area-chart
    Morris.Area({
        element: 'morris-area-chart'
        , data: [{
            period: '2013'
            , Mobile: 48
            , car: 89
            , bike: 43
        }, {
            period: '2014'
            , Mobile: 123
            , car: 194
            , bike: 65
        }, {
            period: '2015'
            , Mobile: 70
            , car: 55
            , bike: 80
        }, {
            period: '2016'
            , Mobile: 45
            , car: 185
            , bike: 165
        }, {
            period: '2017'
            , Mobile: 180
            , car: 130
            , bike: 115
        }, {
            period: '2018'
            , Mobile: 155
            , car: 200
            , bike: 90
        }
            , {
            period: '2019'
            , Mobile: 175
            , car: 190
            , bike: 100
        }, {
            period: '2020'
            , Mobile: 130
            , car: 140
            , bike: 145
        }]
        , xkey: 'period'
        , ykeys: ['Mobile', 'car', 'bike']
        , labels: ['Mobile', 'car', ' bike']
        , pointSize: 3
        , fillOpacity: 0
        , gridLineColor: '#2C3A47'
        , pointStrokeColors: ['#8e44ad', '#1abc9c', '#e74c3c']
        , behaveLikeLine: true
        , lineWidth: 3
        , hideHover: 'auto'
        , lineColors: ['#00bfc7', '#fb9678', '#9675ce']
        , resize: true
    });
});
// pie sparkline
var sparklineLogin = function () {
    $('#sales1').sparkline([30, 88, 66], {
        type: 'pie',
        height: '90',
        resize: true,
        sliceColors: ['#01c0c8', '#7d5ab6', '#ffffff']
    });
    // bar sparkline
    $('#sparkline2dash').sparkline([7, 5, 22, 18, 24, 22], {
        type: 'bar',
        height: '154',
        barWidth: '6',
        resize: true,
        barSpacing: '8',
        barColor: '#2c3e50'
    });

};
var sparkResize;

$(window).resize(function (e) {
    clearTimeout(sparkResize);
    sparkResize = setTimeout(sparklineLogin, 500);
});
sparklineLogin();


// progress smooth bar
var optionsProgress1 = {
    chart: {
        height: 70,
        type: 'bar',
        stacked: true,
        sparkline: {
            enabled: true
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: '20%',
            colors: {
                backgroundBarColors: ['#40475D']
            }
        },
    },
    stroke: {
        width: 0,
    },
    series: [{
        name: 'Process 1',
        data: [44]
    }],
    title: {
        floating: true,
        offsetX: -10,
        offsetY: 5,
        text: 'Process 1'
    },
    subtitle: {
        floating: true,
        align: 'right',
        offsetY: 0,
        text: '44%',
        style: {
            fontSize: '20px'
        }
    },
    tooltip: {
        enabled: false
    },
    xaxis: {
        categories: ['Process 1'],
    },
    yaxis: {
        max: 100
    },
    fill: {
        opacity: 1
    }
}

var chartProgress1 = new ApexCharts(document.querySelector('#progress1'), optionsProgress1);
chartProgress1.render();
// end progress smooth bar
// Perfect scrollBar
// Initialize the plugin
// const todo = document.querySelector('#todo');
// const ps = new PerfectScrollbar(todo);
// const ps = new PerfectScrollbar('#todo', {
//     wheelSpeed: 2,
//     wheelPropagation: true,
//     minScrollbarLength: 20
//   });


// Perfect scrollBar