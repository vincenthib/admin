   </div><!-- /.content-wrapper -->
   <footer class="main-footer">
   	<div class="pull-right hidden-xs">
   		<b>Version</b> 2.0
   	</div>
   	<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
   </footer>

   <!-- Control Sidebar -->
   <?php include_once $root_dir.'/partials/sidebar-right.php' ?>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js" type="text/javascript"></script>
<!-- page script -->

<script>
$(function () {
	/* ChartJS
	* -------
	* Here we will create a few charts using ChartJS
	*/

	$.ajax({
	url: 'modules/stats/browser-usage-data.php',
	async: true,
	type: 'POST',
	dataType: 'json',
	success: function(data) {

		//-------------
		//- PIE CHART -
		//-------------
		if ($("#pieChart canvas").length > 0) {
			// Get context with jQuery - using jQuery's .get() method.
			var pieChartCanvas = $("#pieChart canvas").get(0).getContext("2d");
			var pieChart = new Chart(pieChartCanvas);
			var PieData = data;
			var pieOptions = {
				//Boolean - Whether we should show a stroke on each segment
				segmentShowStroke: true,
				//String - The colour of each segment stroke
				segmentStrokeColor: "#fff",
				//Number - The width of each segment stroke
				segmentStrokeWidth: 2,
				//Number - The percentage of the chart that we cut out of the middle
				percentageInnerCutout: 50, // This is 0 for Pie charts
				//Number - Amount of animation steps
				animationSteps: 100,
				//String - Animation easing effect
				animationEasing: "easeOutBounce",
				//Boolean - Whether we animate the rotation of the Doughnut
				animateRotate: true,
				//Boolean - Whether we animate scaling the Doughnut from the centre
				animateScale: false,
				//Boolean - whether to make the chart responsive to window resizing
				responsive: true,
				// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				maintainAspectRatio: false,
				//String - A legend template
				legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
			};
			//Create pie or douhnut chart
			// You can switch between pie and douhnut using the method below.
			pieChart.Doughnut(PieData, pieOptions);

			for(var i in data) {
				var label = data[i].label;
				var color = data[i].color;
				$('#pieChart').find('.chart-legend').append('<li><i class="fa fa-circle" style="color: '+color+'">'+label+'</i></li>');
			}
		}

	},
	error: function(data){
		console.log(data);
		console.log('Erreur');
	}
	});



  //-------------
  //- PIE CHART -
  //-------------
  if ($("#pieChart-genres").length > 0) {
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart-genres").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieDatas = <?= json_encode($donut_data) ?>;
    /*var PieData = [
      {
        value: 700,
        color: "#f56954",
        highlight: "#f56954",
        label: "Chrome"
      },
      {
        value: 500,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "IE"
      },
      {
        value: 400,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "FireFox"
      },
      {
        value: 600,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Safari"
      },
      {
        value: 300,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Opera"
      },
      {
        value: 100,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Navigator"
      }
    ];*/
    var pieOption = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 0, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: false,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieDatas, pieOption);
  }

  var areaChartData = {
    labels: <?= json_encode($years) ?>,
    datasets: <?= json_encode($line_data) ?>


  };

  var areaChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: true,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 0.1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 1,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 3,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };

  //Create the line chart
  //areaChart.Line(areaChartData, areaChartOptions);
  //-------------
  //- LINE CHART -
  //--------------
  var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
  var lineChart = new Chart(lineChartCanvas);
  var lineChartOptions = areaChartOptions;
  lineChartOptions.datasetFill = false;
  lineChart.Line(areaChartData, lineChartOptions);

	$.ajax({
		url: 'modules/stats/user-stats-data.php',
		async: true,
		type: 'POST',
		dataType: 'json',
		success: function(data) {

			//-------------
			//- BAR CHART -
			//-------------
			if ($("#barChart").length > 0) {

				var barChartCanvas = $("#barChart").get(0).getContext("2d");
				var barChart = new Chart(barChartCanvas);
				var barChartData = data;
				barChartData.datasets[0].fillColor = "#00a65a";
				barChartData.datasets[0].strokeColor = "#00a65a";
				barChartData.datasets[0].pointColor = "#00a65a";
				var barChartOptions = {
					//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					scaleBeginAtZero: true,
					//Boolean - Whether grid lines are shown across the chart
					scaleShowGridLines: true,
					//String - Colour of the grid lines
					scaleGridLineColor: "rgba(0,0,0,.05)",
					//Number - Width of the grid lines
					scaleGridLineWidth: 1,
					//Boolean - Whether to show horizontal lines (except X axis)
					scaleShowHorizontalLines: true,
					//Boolean - Whether to show vertical lines (except Y axis)
					scaleShowVerticalLines: true,
					//Boolean - If there is a stroke on each bar
					barShowStroke: true,
					//Number - Pixel width of the bar stroke
					barStrokeWidth: 2,
					//Number - Spacing between each of the X value sets
					barValueSpacing: 5,
					//Number - Spacing between data sets within X values
					barDatasetSpacing: 1,
					//String - A legend template
					legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
					//Boolean - whether to make the chart responsive
					responsive: true,
					maintainAspectRatio: false
				};

				barChartOptions.datasetFill = false;
				barChart.Bar(barChartData, barChartOptions);

            $('.overlay').hide();
			}

			//--------------
			//- AREA CHART -
			//--------------
			if ($("#areaChart").length > 0) {

				// Get context with jQuery - using jQuery's .get() method.
				var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
				// This will get the first returned node in the jQuery collection.
				var areaChart = new Chart(areaChartCanvas);

				var areaChartOptions = {
					//Boolean - If we should show the scale at all
					showScale: true,
					//Boolean - Whether grid lines are shown across the chart
					scaleShowGridLines: false,
					//String - Colour of the grid lines
					scaleGridLineColor: "rgba(0,0,0,.05)",
					//Number - Width of the grid lines
					scaleGridLineWidth: 1,
					//Boolean - Whether to show horizontal lines (except X axis)
					scaleShowHorizontalLines: true,
					//Boolean - Whether to show vertical lines (except Y axis)
					scaleShowVerticalLines: true,
					//Boolean - Whether the line is curved between points
					bezierCurve: true,
					//Number - Tension of the bezier curve between points
					bezierCurveTension: 0.3,
					//Boolean - Whether to show a dot for each point
					pointDot: false,
					//Number - Radius of each point dot in pixels
					pointDotRadius: 4,
					//Number - Pixel width of point dot stroke
					pointDotStrokeWidth: 1,
					//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
					pointHitDetectionRadius: 1,
					//Boolean - Whether to show a stroke for datasets
					datasetStroke: true,
					//Number - Pixel width of dataset stroke
					datasetStrokeWidth: 2,
					//Boolean - Whether to fill the dataset with a color
					datasetFill: true,
					//String - A legend template
					legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
					//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
					maintainAspectRatio: false,
					//Boolean - whether to make the chart responsive to window resizing
					responsive: true
				};

				//Create the line chart
				areaChart.Line(data, areaChartOptions);
			}


		},
		error: function(){
			console.log('Erreur');
		}
	});

});
</script>
</body>
</html>
