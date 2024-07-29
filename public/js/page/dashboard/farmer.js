
$(function () {

  //-------------
  //- Bar CHART -
  //-------------
  let barChartInit;

  // update/init bar chart
  function loadData(data)
  {
    // bar chart

    if(barChartInit){

      barChartInit.data = data;
      barChartInit.update();

    } else {

      barChartInit = new Chart(document.getElementById("farmer-chart"), {
        type: 'bar',
				data: {
					labels: data.labels,
					datasets: data.datasets,
				},
        options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							position: "top",
						},
					},
					scales: {
						y: {
							ticks: {
								// Include a peso sign in the ticks
								precision: 0,
							},
						},
					},
        },
      });

    }

  }

	function getData(year) {
		$.getJSON('/dashboard/chart', {
			selectedYear: year
		}, function (data) {
			loadData(data);
		});
	}

  // first load of bar chart
	getData($('#yearFilter').val());

	$("#yearFilter").on("change", function () {

		getData($(this).val());

	});

});
