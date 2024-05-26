// // const { Title } = require("chart.js");

// const xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140];
// const yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

// new Chart("myChart", {
//     type: "line",
//     data: {
//         labels: xValues,
//         datasets: [
//             {
//                 backgroundColor: "rgba(0,0,0,0)",
//                 borderColor: "rgba(75,192,192,255)",
//                 label: "Data",
//                 data: yValues,
//             },
//         ],
//     },
//     options: {
//         title: {
//             display: true,
//             text: "Grafik Peminjaman",
//         },
//         scales: {
//             yAxes: [
//                 {
//                     ticks: {
//                         beginAtZero: true,
//                     },
//                 },
//             ],
//         },
//     },
// });

// var aValues = ["Italy", "France", "Spain", "USA", "Argentina"];
// var bValues = [51, 30, 36, 24, 33];
// var barColors = [
//     "rgba(40, 167, 69, 0.7)",
//     "rgba(220, 53, 69, 0.7)",
//     "rgba(0, 123, 255, 0.7)",
//     "rgba(255, 193, 7, 0.7)",
//     "rgba(23, 162, 184, 0.7)",
// ];
// var borderColors = ["#28a745", "#dc3545", "#007bff", "#ffc107", "#17a2b8"];

// new Chart("chart", {
//     type: "bar",
//     data: {
//         labels: aValues,
//         datasets: [
//             {
//                 borderColor: borderColors,
//                 borderWidth: 2,
//                 backgroundColor: barColors,
//                 data: bValues,
//             },
//         ],
//     },
//     options: {
//         legend: { display: false },
//         title: {
//             display: true,
//             text: "Pendapatan Wakaf 500",
//         },
//         scales: {
//             yAxes: [
//                 {
//                     ticks: {
//                         // beginAtZero: true,
//                         // max: Math.max.apply(Math, bValues)*1.2,
//                         // stepSize: 10,
//                         beginAtZero: true,
//                         // padding: 20,
//                     },
//                 },
//             ],
//         },
//     },
// });
