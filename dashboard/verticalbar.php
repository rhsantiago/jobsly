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
<svg id="verticalbarchart" class="chart" width="100%" height="100%"  viewBox="0 0 550 300" preserveAspectRatio="xMidYMid meet"></svg>
<!-- <svg class="chart"></svg> -->
<script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>    
        
<script>
    var data = [30,25,38,52,100];
    var dates = ['Jan','Feb','Mar','Apr','May'];
    var margin = {top: 20, right: 20, bottom: 40, left: 40},
    width = 600 - margin.left - margin.right,
    height = 300 - margin.top - margin.bottom;
    
    
    var mindate = new Date(2012,0,1),
            maxdate = new Date(2012,0,31);
/*
    var xScale = d3.time.scale()
	          .domain([mindate, maxdate])    // values between for month of january
		      .range([0, width-60]);
*/   
    var xScale = d3.scale.ordinal()
	          .domain(dates)    // values between for month of january
		      .rangeRoundBands([0, 64 * data.length]);
    
    var yScale = d3.scale.linear()
                    .domain([0,d3.max(data)])
                    .range([height,0]);
    
    var dataHeightScale = d3.scale.linear()
                    .domain([0,d3.max(data)])
                    .range([0,height]);
    
    var newScaledData = [];
    for (var i = 0; i < data.length; i++) {
      newScaledData[i] = dataHeightScale(data[i]);
    }
    
    var yaxis = d3.svg.axis()
                .orient("left")
                .ticks(data.length)              
                .scale(yScale);
   
    var xaxis = d3.svg.axis()
            .orient("bottom")
            .ticks(dates.length)   
            .scale(xScale);

    var canvas = d3.select("#verticalbarchart")
                .append("svg")
                .attr("width", width)
                .attr("height", height+margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    canvas.append("rect")
                            .attr("width", "100%")
                            .attr("height", "100%")
                            .attr("fill", "yellow");
    var bars = canvas.selectAll("rect")
                .data(newScaledData)
                .enter()
                    .append("rect")
                    .attr("height", 0)
                    .attr("width", 60)
                    .attr("fill", "teal")
                    .attr("y", function(d) { return height - .5; })     
                    .transition().duration(700)
                    .ease("linear")
                    .attr("fill", "teal")
                    .attr("x", function(d,i){ return i * 64;}) // bar spacing
                    .attr("y", function(d) {
                                    return height- d;  //Height minus data value
                                })
                    .attr("height", function(d){return d;});
                
    canvas.selectAll("text")
                     .data(newScaledData)
                     .enter()
                        .append("text")
                        .attr("x", function(d,i){ return i * 65;})
                        .attr("y", function(d) {
                                    return height - d + 15;  //Height minus data value
                                })            
                    .attr("fill", "white")
                    .attr("font-size",12)
                    .text(function(d,i){ return data[i];});

   
    canvas.append("g")
            .attr("transform", "translate(-2,0)")  
            .attr("font-size",8)
            .style({ 'stroke': 'black', 'fill': 'none', 'stroke-width': '1px'})
            .call(yaxis);
   
    canvas.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(-2,"+height+")")      
            .attr("font-size",8)            
            .style({ 'stroke': 'black', 'fill': 'none', 'stroke-width': '1px'})            
            .call(xaxis)
                 
</script>
     </div>
</section>