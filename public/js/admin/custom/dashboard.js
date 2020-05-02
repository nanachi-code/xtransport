$(function () {
    // ================================================================================================
    //* Today comment
    $("#dashboard-today-comments").DataTable();

    if ($("#lineChart").length) {
        var lineChart = $("#lineChart"); // line chart data

        var lineData = {
            labels: ["1", "5", "10", "15", "20", "25", "30", "35"],
            datasets: [
                {
                    label: "Visitors Graph",
                    fill: false,
                    lineTension: 0.3,
                    backgroundColor: "#fff",
                    borderColor: "#047bf8",
                    borderCapStyle: "butt",
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: "miter",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#141E41",
                    pointBorderWidth: 3,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: "#FC2055",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: [27, 20, 44, 24, 29, 22, 43, 52],
                    spanGaps: false,
                },
            ],
        }; // line chart init

        var myLineChart = new Chart(lineChart, {
            type: "line",
            data: lineData,
            options: {
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [
                        {
                            ticks: {
                                fontSize: "11",
                                fontColor: "#969da5",
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0.05)",
                                zeroLineColor: "rgba(0,0,0,0.05)",
                            },
                        },
                    ],
                    yAxes: [
                        {
                            display: false,
                            ticks: {
                                beginAtZero: true,
                                max: 65,
                            },
                        },
                    ],
                },
            },
        });
    }
});
