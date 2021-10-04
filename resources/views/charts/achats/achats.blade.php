@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div id="chart"></div>

        </div>
    </div>
    <script>
        const render = async () =>{
        const { data : dates  } = await axios.get("achats/api")
        console.log(dates)
        var options = {
            series: [{
                name: 'Achats',
                data: dates
            }],
            chart: {
                type: 'area',
                stacked: false,
                height: 350,
                zoom: {
                    type: 'x',
                    enabled: true,
                    autoScaleYaxis: true
                },
                toolbar: {
                    autoSelected: 'zoom'
                }
            },
            dataLabels: {
                enabled: false
            },
            markers: {
                size: 0,
            },
            title: {
                text: 'Achats',
                align: 'left'
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                    stops: [0, 90, 100]
                },
            },
            yaxis: {
                labels: {
                    
                },
                title: {
                    text: 'Vente'
                },
            },
            xaxis: {
                type: 'datetime',
            },
            tooltip: {
                shared: false,
                
            }
        };

        
            const chart = new window.Apexcharts(document.querySelector("#chart"), options);
            chart.render();
            
    }
    setTimeout(() => {
    render()
        }, 400);
    </script>
@endsection
