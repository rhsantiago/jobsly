<section class="blog-post">
    <div class="panel panel-default">                                    
         <div class="panel-body">
                <div><h4 class="text-info h4weight">Monthly Views</h4></div>
          </div>
 <style>
      .axis {
   font: 10px sans-serif;
 }

 .axis path,
 .axis line {
   fill: none;
   stroke: #000;
   shape-rendering: crispEdges;
 }

 </style>

<svg class="chart"></svg>
<script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>    
        
<script>
    var data = [30,25,52,85,70];
    var dates = ['Jan','Feb','Mar','Apr','May'];
    var margin = {top: 20, right: 20, bottom: 40, left: 40},
    width = 600 - margin.left - margin.right,
    height = 300 - margin.top - margin.bottom;
    
    var yScale = d3.scale.ordinal()
	          .domain(dates)    // values between for month of january
		      .rangeRoundBands([0, 44 * data.length]);
    
    var xScale = d3.scale.linear()
                    .domain([0,d3.max(data)])
                    .range([0,width]);
    
    var dataWidthScale = d3.scale.linear()
                    .domain([0,d3.max(data)])
                    .range([0,width]);
    
    var newScaledData = [];
        for (var i = 0; i < data.length; i++) {
          newScaledData[i] = dataWidthScale(data[i]);
        }
    
    var yaxis = d3.svg.axis()
                .orient("left")
                .ticks(dates.length)              
                .scale(yScale);
   
    var xaxis = d3.svg.axis()
            .orient("bottom")
            .ticks(data.length)   
            .scale(xScale);
    
    var canvas = d3.select("body")
                .append("svg")
                .attr("width", width+50)
                .attr("height", height)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    
     var bars = canvas.selectAll("rect")
                .data(newScaledData)
                .enter()
                    .append("rect")
                    .attr("height", 40)
                    .attr("width", 0)
                    .attr("fill", "teal")                    
                    .attr("y", function(d,i){ return i * 44;})
                    .attr("x", 0)
   
                    .transition().duration(700)
                    .ease("linear")
                    .attr("fill", "teal")
                   /* .attr("y", function(d,i){ return i * 44;}) // bar spacing
                    .attr("x", function(d) {
                                    return (width - d);  //Height minus data value
                                })*/
                    .attr("width", function(d){return d;});
    
     canvas.selectAll("text")
                     .data(newScaledData)
                     .enter()
                        .append("text")
                        .attr("x", function(d,i){ return newScaledData[i]-20})
                        .attr("y", function(d,i){ return i * 44 + 20})
                        .attr("fill", "white")
                        .attr("font-size",12)
                        .text(function(d,i){ return data[i];});
    
   canvas.append("g")
            .attr("transform", "translate(-2,0)")  
            .attr("font-size",8)
            .style({ 'stroke': 'black', 'fill': 'none', 'stroke-width': '1px'})
            .call(yaxis);
   
</script>    

        
        
        
</div>
</section>        