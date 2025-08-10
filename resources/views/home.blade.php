 <x-layout>
    
  <head>
  <script src="https://code.highcharts.com/highcharts.js"></script>

    {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


    var productData = {{Js::from($chartdata)}}
    console.log(productData);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([productData]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script> --}}

  </head>
  <body>
    {{-- <div id="curve_chart" style="width: 900px; height: 500px"></div> --}}
   <div style="display: flex">
     <div id="container" style=" width: 600px; height: 400px"></div>
     <div id="subcontainer" style=" width: 600px; height: 400px"></div>
   </div>
  </body>


     {{-- <script>
      var datakeys = @json(array_keys($chartData));
      var datavalues = @json(array_values($chartData));
      console.log(datakeys);
      console.log(datavalues);
        Highcharts.chart('container', {
            chart: {
              type: 'column',
            },
            title: {
              text: 'Grouping Products By Day',
            },
            subtitle: {
              text:
                'Source: <a target="_blank" ' +
                'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>',
            },
            xAxis: {
              categories: datakeys,
              crosshair: true,
              accessibility: {
                description: 'Countries',
              },
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Number of Products',
              },
            },
            tooltip: {
              valueSuffix: ' (1000 MT)',
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 0,
              },
            },
            series: [
              {
                name: 'Month',
                data: datavalues,
              },
               
            ],
          })

    </script>  --}}

<script>
    var datakeys = @json($labels);
    var datavalues = @json($values);

    console.log(datakeys);   // e.g. ["Monday", "Tuesday", ...]
    console.log(datavalues); // e.g. [5, 10, ...]

    Highcharts.chart('container', {
        chart: {
            type: 'column',
        },
        title: {
            text: 'Grouping Products By Day',
        },
        xAxis: {
            categories: datakeys,
            crosshair: true,
            accessibility: {
                description: 'Days of the week',
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Products',
            },
        },
        
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
            },
        },
        series: [
            {
                name: 'Products',
                data: datavalues,
            },
        ],
    });

</script>

{{-- <script>
    var datakeys = @json($datakeys);
    var datavalues = @json($datavalues);

    Highcharts.chart('subcontainer', {
        chart: { type: 'column' },
        title: { text: 'Products by Brand' },
        xAxis: { categories: datakeys },
        yAxis: { title: { text: 'Number of Products' } },
        series: [{
            name: 'Brand',
            data: datavalues
        }]
    });
</script> --}}


 <script>
  var datakeys = @json($datakeys);
  var datavalues = @json($datavalues);

  // Transform data for Highcharts
  var pieData = datakeys.map((brand, index) => ({
    name: brand,
    y: datavalues[index]
  }));

  Highcharts.chart('subcontainer', {
    chart: {
      type: 'pie',
      zooming: { type: 'xy' },
      panning: { enabled: true, type: 'xy' },
      panKey: 'shift'
    },
    title: {
      text: 'Products by Brand Distribution'
    },
    tooltip: {
      valueSuffix: ' units'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: [{
          enabled: true,
          distance: 20
        }, {
          enabled: true,
          distance: -40,
          format: '{point.percentage:.1f}%',
          style: {
            fontSize: '1.2em',
            textOutline: 'none',
            opacity: 0.7
          },
          filter: {
            operator: '>',
            property: 'percentage',
            value: 10
          }
        }]
      }
    },
    series: [{
      name: 'Products',
      colorByPoint: true,
      data: pieData
    }]
  });
</script>

 </x-layout>

 