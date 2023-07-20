<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NGM Rental Mgt.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script>
        var subjectObject = {
            "Honda": {
                "Vision - NSC": ["2013", "2014", "2015", "2016", "2017 - Current"],
                "PCX - WW": ["2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021 - Current"],
                "SH": ["2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021 - Current"],
                "SH MODE - FSH / ANC": ["2013", "2014", "2015", "2016", "2017 - Current"],
                "Forza - NSS": ["2015", "2016", "2017", "2018", "2019 - Current"]
            },
            "Yamaha": {
                "NMAX": ["2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021 - Current", ],
                "XMAX - YP": ["2015", "2016", "2017", "2018", "2019 - Current", ]
            }
        }
        window.onload = function() {
            var subjectSel = document.getElementById("make");
            var topicSel = document.getElementById("model");
            var chapterSel = document.getElementById("year");
            for (var x in subjectObject) {
                subjectSel.options[subjectSel.options.length] = new Option(x, x);
            }
            subjectSel.onchange = function() {
                //empty Chapters- and Topics- dropdowns
                chapterSel.length = 1;
                topicSel.length = 1;
                //display correct values
                for (var y in subjectObject[this.value]) {
                    topicSel.options[topicSel.options.length] = new Option(y, y);
                }
            }
            topicSel.onchange = function() {
                //empty Chapters dropdown
                chapterSel.length = 1;
                //display correct values
                var z = subjectObject[subjectSel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
                }
            }
        }
    </script>
</head>

<body>

    @include('layouts.partials.navbar')

    <main class="container">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <!-- Include Chart.js from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('rentals');

        // Create a chart that acquires the myChart canvas element and instantiates new Chart
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['For Rent', 'Rented', 'For Sale', 'Sold', 'Repairs', 'Cat B', 'CIP', 'Impounded', 'Accident', 'Missing', 'Stolen'],
                datasets: [{
                    label: '# of Votes',
                    data: [33, 12, 24, 1, 0, 0, 0, 0, 0, 0, 0],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>