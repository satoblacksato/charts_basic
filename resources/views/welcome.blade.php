<!DOCTYPE html>
<html>
<head>
    <title>Chart</title>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
    $(function () {


        $.ajax({
            url: '/charts',
            type: 'POST',
            headers:{'X-CSRF-TOKEN':$("input[name='_token']").val()},
            data: [],
            dataType: "json",
            success: function(result)
            {


var dataLaravel=result.data;
var dataLine=result.line;

$('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafica de uso de internet'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: dataLaravel
        }]
    });





$('#container2').highcharts({
        title: {
            text: 'Prestamos',
            x: -20 //center
        },
        subtitle: {
            text: 'los prestamos',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: dataLine
    });




            },
            fail: function(result ){
              alert( "La solicitud a fallado: ");
            }
        });




    
});
</script>

</head>
<body>
        Data
    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

    <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

    <input type="hidden" name='_token' value="{{ Session::token() }}"></input>

</body>
</html>