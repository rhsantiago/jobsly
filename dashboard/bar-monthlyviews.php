<section class="blog-post">
    <div class="panel panel-default">                                    
         <div class="panel-body jobad-bottomborder">
                <div><h4 class="text-info h4weight">Monthly Views</h4></div>
          </div>
<style type="text/css">
			
			.axis path,
			.axis line {
				fill: none;
				stroke: black;
				shape-rendering: crispEdges;
			}
			
			.axis text {
				font-family: sans-serif;
				font-size: 11px;
			}

		</style>

<svg class="chart"></svg>
<script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
<!--<script src="https://d3js.org/d3.v4.min.js"></script>        -->

   <script type="text/javascript">

			//Width and height
			var w = 500;
			var h = 200;
			var barPadding = 1;
			var padding = 30;
            var xpadding = 5;
            var ypadding = 20;
            var margin = {top: 20, right: 10, bottom: 30, left: 30};
			//var dataset = [ 5, 10, 13, 19, 21, 25, 22, 18, 15, 13,11, 12, 15, 20, 18, 17, 16, 18, 23, 25 ];
            var dataset = [ 5, 10, 13, 19, 21];
            var dataset2 = [ 'Jan', 'Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
       
            var xScale = d3.time.scale().domain([new Date(2013, 0, 1), new Date(2013, 11, 31)]).range([0, w]);
            var x = d3.scale.linear().domain([0, dataset2.length]).range([0, w]);
           //Create scale functions
        /*
			var xScale = d3.scale.linear()
								 .domain(['Jan','Dec'])
								 .range([0, w]);
        */
			var yScale = d3.scale.linear()
								 .domain([0, d3.max(dataset, function(d) { return d; })])
								  .range([h, 0]);

			//Define X axis
			var xAxis = d3.svg.axis()
							  .scale(xScale)
							  .orient("bottom")
							  .ticks(dataset2.length)
                                .tickFormat(d3.time.format("%b"));;

			//Define Y axis
			var yAxis = d3.svg.axis()
							  .scale(yScale)
							  .orient("left")
							  .ticks(5);
			
			//Create SVG element
			var svg = d3.select("body")
						.append("svg")					
                        .attr("width", w + margin.left + margin.right)
                        .attr("height", h + margin.top + margin.bottom)
                        .append("g")
                        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

			svg.selectAll("rect")
			   .data(dataset)
			   .enter()
			   .append("rect")
			   .attr("x", function(d, i) {
			   		return i * (w / dataset.length);
			   })
			   .attr("y", function(d) {
			   		return h - (d * 8)-10;
			   })
			   //.attr("width", w / dataset.length - barPadding)
                .attr("width", 25) //width of each bar
			   .attr("height", function(d) {
			   		return (d * 8) +10;
			   })
			   .attr("fill", "teal");
       
            svg.selectAll("text")
			   .data(dataset)
			   .enter()
			   .append("text")
			   .text(function(d) {
			   		return d;
			   })
			   .attr("x", function(d, i) {
			   		return i * (w / dataset.length) + 5;
			   })
			   .attr("y", function(d) {
			   		return h - (d * 8) + 5;
			   })
			   .attr("font-family", "sans-serif")
			   .attr("font-size", "11px")
			   .attr("fill", "white");  
       
            //Create X axis
			svg.append("g")
				.attr("class", "axis")
				.attr("transform", "translate(0," + (h + 10) + ")")
				.call(xAxis);
			
			//Create Y axis
			svg.append("g")
				.attr("class", "axis")
				.attr("transform", "translate(" + (-10) + ",0)")
				.call(yAxis);
     
		</script>
     </div>
</section>