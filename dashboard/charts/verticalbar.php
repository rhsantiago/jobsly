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
    var data = [30,25,38,52];
    var margin = {top: 20, right: 20, bottom: 40, left: 40},
    width = 600 - margin.left - margin.right,
    height = 300 - margin.top - margin.bottom;
    
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
                .ticks(5)              
                .scale(yScale);

    var canvas = d3.select("body")
                .append("svg")
                .attr("width", width)
                .attr("height", height)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    
    var bars = canvas.selectAll("rect")
                .data(newScaledData)
                .enter()
                    .append("rect")
                    .attr("height", function(d){return d;})
                    .attr("width", 30)
                    .attr("fill", "teal")                    
                    .attr("x", function(d,i){ return i * 40;})
                    .attr("y", function(d) {
                                    return height - d;  //Height minus data value
                                });
    
                    canvas.selectAll("text")
                     .data(newScaledData)
                    .enter()
                        .append("text")
                        .attr("x", function(d,i){ return i * 41;})
                        .attr("y", function(d) {
                                    return height - d + 15;  //Height minus data value
                                })
                    .attr("fill", "white")
                    .text(function(d,i){ return data[i];});

   
    canvas.append("g")
            .attr("transform", "translate(-2,0)")      
            .attr("font-size",8)
              .style({ 'stroke': 'black', 'fill': 'none', 'stroke-width': '1px'})
            .call(yaxis);
       
</script>
     </div>
</section>