@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Dashboard</h2>
        </div>

        <div class="row mt-4">
            <div class="col-md-2 mx-auto">
                <div class="card bg-light text-dark">
                    <h5 class="card-text p-3 text-center">{{ $menu }} Dishes <i class="fa-solid fa-bowl-rice"></i>
                    </h5>
                </div>
            </div>
            <div class="col-md-3 mx-auto">
                <div class="card bg-light text-dark">
                    <h5 class="card-text p-3 text-center">10 Catering Events</h5>
                </div>
            </div>
            <div class="col-md-3 mx-auto">
                <div class="card bg-light text-dark">
                    <h5 class="card-text p-3 text-center"> {{ $noOfCustomers }} Customers <i class="fa-solid fa-users"></i>
                    </h5>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div id="myPlot" style="width:100%;max-width:700px; height:330px;"></div>
            </div>

            <div class="col-md-6">
                <canvas id="donutChart" style="width:100%;max-width:700px; height:330px;"></canvas>
            </div>
        </div>

        <div class="row mt-5">


        </div>

    </div>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        // Created a bar chart to analyze order status
        const xArray = ["Preparing", "Cooking", "Packing"];
        const yArray = [
            {{ $orderStatusPrepared }},
            {{ $orderStatusCooked }},
            {{ $orderStatusPacked }}
        ];

        const data = [{
            x: xArray,
            y: yArray,
            type: "bar",
            marker: {
                color: ["orange", "lightblue", "#32cd32"]
            }
        }];

        const layout = {
            title: "Order Status Stats"
        };

        Plotly.newPlot("myPlot", data, layout);

        // Created a donut chart to show event distribution dishes by category
        const xData = [
            'Breakfast',
            'Lunch',
            'Dinner',
            'Wedding',
            'Birthday Party',
            'Corporate',
            'Family Get Together',
            'Holiday Parties'
        ]
        const yData = [
            {{ $breakfastCount }},
            {{ $lunchCount }},
            {{ $dinnerCount }},
            {{ $weddingCount }},
            {{ $birthdayPartyCount }},
            {{ $corporateCount }},
            {{ $familyGetTogetherCount }},
            {{ $holidayPartiesCount }}
        ]
        const barColors = [
            "#FF7F50", // Breakfast - Coral for a vibrant and warm start to the day
            "#3CB371", // Lunch - Medium Sea Green to represent fresh and healthy options
            "#1E90FF", // Dinner - Dodger Blue, a bold but calming color for evening meals
            "#FFD700", // Wedding - Gold to symbolize celebration and elegance
            "#FF6347", // Birthday Party - Tomato Red, bright and lively for a festive mood
            "#6A5ACD", // Corporate - Slate Blue, professional and slightly formal
            "#8B4513", // Family Get Together - Saddle Brown, for warmth and tradition
            "#20B2AA", // Holiday Parties - Light Sea Green, festive but not too intense
        ];
        new Chart("donutChart", {
            type: "doughnut",
            data: {
                labels: xData,
                datasets: [{
                    backgroundColor: barColors,
                    data: yData
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Event Menu Preferences"
                }
            }
        });
    </script>
@endsection
