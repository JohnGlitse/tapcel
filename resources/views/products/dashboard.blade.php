<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/layout.css'])
    @vite(['resources/css/dashboard.css'])
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.7.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/funnel.js"></script>

    <title>TapCel</title>
</head>
<body>
       <div id="dashboard">
        <div class="side-bar">
            <div class="logo">Logo</div>
            <div class="side-bar-items">
                <div class="items">
                <li>Dashboard</li>
                <li>Users</li>
                <li><a href="{{route('product.create')}}">Add Product</a></li>
                <li><a href="{{route('users.create')}}">Add User</a></li>
                
            </div>
                <li>Logout</li>
            </div>
        </div>
        <div class="container">
            <div class="header">
                <li><a href="{{route('product.index')}}">Home</a></li>
                <form action="" method="post" class="search">
                    @csrf
                    <input type="text" name="search" placeholder="Search...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="content">
                <div class="boxes">
                    <div class="box">
                        <h2>Total Products</h2>
                         <p>{{$products->total()}}</p>
                    </div>
                    <div class="box">
                        <h2>Total Users</h2>
                         <p>{{$users->total()}}</p>
                    </div>
                    <div class="box">Total Orders</div>
                    <div class="box">Total Sales</div>
                    <div class="box">Monthly Visitors</div>
                </div>
                <div class="charts">
                    <div class="pie">
                         <div id="container"></div>
                    </div>
                    <div class="pie">
                        <div id="funnelChart"></div>
                    </div>
                </div>
                <div class="tables">
                    <div>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{Str::words($product->title, 1)}}</td>
                                <td>{{$product->brand}}</td>
                                <td>{{$product->price}}</td>
                                <td><img src="{{asset('storage/' . $product->file)}}" width="50px"></td>
                                <td>
                                    <a href="{{route('product.edit', $product)}}"><button>Update</button></a>
                                </td>
                                <td>
                                    <form action="{{route('product.destroy', $product)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <Button type="submit" class="delete">Delete</Button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach
                    </table>
                    <p>{{$products->links()}}</p>
                    </div>


                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                         @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname . ' '. $user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->gender}}</td>
                            <td>
                                <a href="{{route('users.edit', $user)}}">
                                   <button>Update</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('users.destroy', $user)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <Button type="submit" class="delete">Delete</Button>
                                </form>
                            </td> 
                            
                        </tr>
                         @endforeach
                    </table>
                    
                </div>

            </div>
        </div>
    </div>

    {{-- @foreach ($items as $item)
        <p>{{$item->title}}</p>
        <p>{{$item->description}}</p>
    @endforeach --}}



    <script>
   

  var datakeys = @json($datakeys);
  var datavalues = @json($datavalues);

  // Transform data for Highcharts
  var pieData = datakeys.map((brand, index) => ({
    name: brand,
    y: datavalues[index]
  }));

        (function (H) {
    H.seriesTypes.pie.prototype.animate = function (init) {
        const series = this,
            chart = series.chart,
            points = series.points,
            {
                animation
            } = series.options,
            {
                startAngleRad
            } = series;

        function fanAnimate(point, startAngleRad) {
            const graphic = point.graphic,
                args = point.shapeArgs;

            if (graphic && args) {

                graphic
                    // Set inital animation values
                    .attr({
                        start: startAngleRad,
                        end: startAngleRad,
                        opacity: 1
                    })
                    // Animate to the final position
                    .animate({
                        start: args.start,
                        end: args.end
                    }, {
                        duration: animation.duration / points.length
                    }, function () {
                        // On complete, start animating the next point
                        if (points[point.index + 1]) {
                            fanAnimate(points[point.index + 1], args.end);
                        }
                        // On the last point, fade in the data labels, then
                        // apply the inner size
                        if (point.index === series.points.length - 1) {
                            series.dataLabelsGroup.animate({
                                opacity: 1
                            },
                            void 0,
                            function () {
                                points.forEach(point => {
                                    point.opacity = 1;
                                });
                                series.update({
                                    enableMouseTracking: true
                                }, false);
                                chart.update({
                                    plotOptions: {
                                        pie: {
                                            innerSize: '40%',
                                            borderRadius: 8
                                        }
                                    }
                                });
                            });
                        }
                    });
            }
        }

        if (init) {
            // Hide points on init
            points.forEach(point => {
                point.opacity = 0;
            });
        } else {
            fanAnimate(points[0], startAngleRad);
        }
    };
}(Highcharts));

Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Count of Product by Brand'
    },
    tooltip: {
        headerFormat: '',
        pointFormat:
            '<span style="color:{point.color}">\u25cf</span> ' +
            '{point.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            borderWidth: 2,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                //format: `<b>{point.name}</b><br>${Math.round('{this.percentage}')}%`,
                //distance: 50
                format: '<b>{point.name}</b><br>{point.y:.0f}'
                //format: '<b>{point.name}</b><br>{point.percentage:.0f}%'
             
            
            }
        }
    },
  
   series: [{
      name: 'Products',
      //colorByPoint: true,
      data: pieData
    }]
});


    </script>


<script>
    
    
Highcharts.chart('funnelChart', {
    chart: {
        type: 'funnel'
    },
    title: {
        text: 'Sales funnel'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['40%', '50%'],
            neckWidth: '30%',
            neckHeight: '25%',
            width: '80%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Unique users',
        data: [
//[datakeys, datavalues],
            // ['Downloads', 4064],
            // ['Requested price list', 1987],
            // ['Invoice sent', 976],
            // ['Finalized', 846]
          //  datavalues, datakeys
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});

</script>
</body>
</html>