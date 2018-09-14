$(function() {

    Morris.Line({
        element: 'morris-one-line-chart',
            data: [
                { day: '16', value: 8 },
                { day: '17', value: 13 },
                { day: '18', value: 15 },
                { day: '19', value: 12 },
                { day: '21', value: 7 },
                { day: '22', value: 9 },
                { day: '23', value: 11 }
            ],
        xkey: 'day',
        ykeys: ['value'],
        resize: false,
        lineWidth:2,
        labels: ['заказов'],
        lineColors: ['#fff'],
        pointSize:6,
		pointFillColors: ['#20D8CD'],
    });
});

$(function() {

    Morris.Line({
        element: 'morris-one-line-chart_1',
            data: [
                { day: '16', value: 8 },
                { day: '17', value: 13 },
                { day: '18', value: 15 },
                { day: '19', value: 12 },
                { day: '21', value: 7 },
                { day: '22', value: 9 },
                { day: '23', value: 11 }
            ],
        xkey: 'day',
        ykeys: ['value'],
        resize: false,
		pointFillColors: ['#20ACD8'],
        lineWidth:2,
        labels: ['заказов'],
        lineColors: ['#fff'],
        pointSize:6,
    });
});

$(function() {

    Morris.Line({
        element: 'morris-one-line-chart_2',
            data: [
                { day: '16', value: 8 },
                { day: '17', value: 13 },
                { day: '18', value: 15 },
                { day: '19', value: 12 },
                { day: '21', value: 7 },
                { day: '22', value: 9 },
                { day: '23', value: 11 }
            ],
        xkey: 'day',
        ykeys: ['value'],
        resize: false,
        lineWidth:2,
        labels: ['заказов'],
        lineColors: ['#fff'],
        pointSize:6,
		pointFillColors: ['#E46D9F'],
    });
});
