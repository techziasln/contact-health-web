'use strict';
var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

$(document).ready(function () {

    // Chart in Dashboard version 1
    var echartElemBar = document.getElementById('echartBar');
    if (echartElemBar) {
        var echartBar = echarts.init(echartElemBar);
        echartBar.setOption({
            legend: {
                borderRadius: 0,
                orient: 'horizontal',
                x: 'right',
                data: ['Income']
            },
            grid: {
                left: '8px',
                right: '8px',
                bottom: '0',
                containLabel: true
            },
            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)'
            },
            xAxis: [{
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                axisTick: {
                    alignWithLabel: true
                },
                splitLine: {
                    show: false
                },
                axisLine: {
                    show: true
                }
            }],
            yAxis: [{
                type: 'value',
                axisLabel: {
                    formatter: '${value}'
                },
                min: 0,
                max: 100000,
                interval: 25000,
                axisLine: {
                    show: false
                },
                splitLine: {
                    show: true,
                    interval: 'auto'
                }
            }],

            series: [

                 {
                name: 'Expense',
                data: [45000, 82000, 35000, 93000, 71000, 89000, 49000, 91000, 80200, 86000, 35000, 40050],
                label: { show: false, color: '#011eff' },
                type: 'bar',
                color: '#3760ff',
                smooth: true,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowOffsetY: -2,
                        shadowColor: 'rgba(0, 0, 0, 0.3)'
                    }
                }
            }]
        });
        $(window).on('resize', function () {
            setTimeout(function () {
                echartBar.resize();
            }, 500);
        });
    }

    // Chart in Dashboard version 1
    var echartElemPie = document.getElementById('echartPie');



    if (echartElemPie) {
        var echartPie = echarts.init(echartElemPie);
        echartPie.setOption({
            color: ['#011eff', 'rgba(1,30,255,0.85)', 'rgba(1,30,255,0.62)', 'rgba(1,30,255,0.42)', 'rgba(55,90,219,0.65)', 'rgba(52,86,231,0.82)'],
            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)'
            },

            series: [{
                name: 'Sales by Country',
                type: 'pie',
                radius: '60%',
                center: ['50%', '50%'],
                data: [{ value: 535, name: 'USA' }, { value: 310, name: 'Brazil' }, { value: 234, name: 'France' }, { value: 155, name: 'BD' }, { value: 130, name: 'UK' }, { value: 348, name: 'India' }],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        });
        $(window).on('resize', function () {
            setTimeout(function () {
                echartPie.resize();
            }, 500);
        });
    }





    var echartElemPie = document.getElementById('Todayst');
    var count = document.getElementById('count').value;
    var nocount = document.getElementById('nocount').value;
    if (echartElemPie) {

        var echartPie = echarts.init(echartElemPie);
        echartPie.setOption({
            color: ['#00A995', '#006699', 'rgba(1,30,255,0.62)', 'rgba(1,30,255,0.42)', 'rgba(55,90,219,0.65)', 'rgba(52,86,231,0.82)'],
            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)'
            },

            series: [{
                name: 'Contacts',
                type: 'pie',
                radius: '60%',
                center: ['50%', '50%'],
                data: [count!=0?{ value: count, name: 'Updated' }:null, nocount!=0 ?{ value: nocount, name: 'Not Updated' }:null],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        });
        $(window).on('resize', function () {
            setTimeout(function () {
                echartPie.resize();
            }, 500);
        });
    }


    var basicDoughnutElem = document.getElementById('basicDoughnut');
    var fever = document.getElementById('fever').value;
    var cough = document.getElementById('cough').value;
    var suffocation = document.getElementById('suffocation').value;
    var cold = document.getElementById('cold').value;
    var throat = document.getElementById('throat').value;

    if (basicDoughnutElem) {
        var basicDoughnut = echarts.init(basicDoughnutElem);
        basicDoughnut.setOption({
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            color: ['#c13018', '#f36e12', '#ebcb37', '#a1b968', '#0d94bc', '#135bba'],
            tooltip: {
                show: false,
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            xAxis: [{
                axisLine: {
                    show: false
                },
                splitLine: {
                    show: false
                }
            }],
            yAxis: [{
                axisLine: {
                    show: false
                },
                splitLine: {
                    show: false
                }
            }],
            series: [{
                name: 'Sessions',
                type: 'pie',
                radius: ['50%', '85%'],
                center: ['50%', '50%'],
                avoidLabelOverlap: false,
                hoverOffset: 5,
                label: {
                    normal: {
                        show: false,
                        position: 'center',
                        textStyle: {
                            fontSize: '13',
                            fontWeight: 'normal'
                        },
                        formatter: "{a}"
                    },
                    emphasis: {
                        show: true,
                        textStyle: {
                            fontSize: '15',
                            fontWeight: 'bold'
                        },
                        formatter: "{b} \n{c} ({d}%)"
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data: [{
                    value: fever,
                    name: 'പനി'
                }, {
                    value: cough,
                    name: 'ചുമ'
                }, {
                    value: suffocation,
                    name: 'ശ്വാസ തടസം'
                }, {
                    value: throat,
                    name: 'തൊണ്ടവേദന'
                }, {
                    value: cold,
                    name: 'ജലദോഷം'
                }],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        });
        $(window).on('resize', function () {
            setTimeout(function () {
                basicDoughnut.resize();
            }, 500);
        });
    } // BASIC Area Charts




    // Chart in Dashboard version 1
    var echartElem1 = document.getElementById('echart1');
    if (echartElem1) {
        var echart1 = echarts.init(echartElem1);
        echart1.setOption(_extends({}, echartOptions.lineFullWidth, {
            series: [_extends({
                data: [30, 40, 20, 50, 40, 80, 90]
            }, echartOptions.smoothLine, {
                markArea: {
                    label: {
                        show: true
                    }
                },
                areaStyle: {
                    color: 'rgba(1,30,255,0.52)',
                    origin: 'start'
                },
                lineStyle: {
                    color: '#3760ff'
                },
                itemStyle: {
                    color: '#011eff'
                }
            })]
        }));
        $(window).on('resize', function () {
            setTimeout(function () {
                echart1.resize();
            }, 500);
        });
    }
    // Chart in Dashboard version 1
    var echartElem2 = document.getElementById('echart2');
    if (echartElem2) {
        var echart2 = echarts.init(echartElem2);
        echart2.setOption(_extends({}, echartOptions.lineFullWidth, {
            series: [_extends({
                data: [30, 10, 40, 10, 40, 20, 90]
            }, echartOptions.smoothLine, {
                markArea: {
                    label: {
                        show: true
                    }
                },
                areaStyle: {
                    color: 'rgba(255, 193, 7, 0.2)',
                    origin: 'start'
                },
                lineStyle: {
                    color: '#FFC107'
                },
                itemStyle: {
                    color: '#FFC107'
                }
            })]
        }));
        $(window).on('resize', function () {
            setTimeout(function () {
                echart2.resize();
            }, 500);
        });
    }
    // Chart in Dashboard version 1
    var echartElem3 = document.getElementById('echart3');
    if (echartElem3) {
        var echart3 = echarts.init(echartElem3);
        echart3.setOption(_extends({}, echartOptions.lineNoAxis, {
            series: [{
                data: [40, 80, 20, 90, 30, 80, 40, 90, 20, 80, 30, 45, 50, 110, 90, 145, 120, 135, 120, 140],
                lineStyle: _extends({
                    color: 'rgba(1,30,255,0.8)',
                    width: 3
                }, echartOptions.lineShadow),
                label: { show: true, color: '#212121' },
                type: 'line',
                smooth: true,
                itemStyle: {
                    borderColor: 'rgb(1,30,255)'
                }
            }]
        }));
        $(window).on('resize', function () {
            setTimeout(function () {
                echart3.resize();
            }, 500);
        });
    }
});
